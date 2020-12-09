import Constants from 'expo-constants';
import * as Notifications from 'expo-notifications';
import * as Permissions from 'expo-permissions';
import React, { useState, useEffect, useRef } from 'react';
import { Text, View, Button, Platform, StyleSheet } from 'react-native';
import { WebView } from 'react-native-webview';


Notifications.setNotificationHandler({
    handleNotification: async () => ({
        shouldShowAlert: true,
        shouldPlaySound: false,
        shouldSetBadge: false,
    }),
});



export default function App() {
    const [expoPushToken, setExpoPushToken] = useState('');
    const [notification, setNotification] = useState(false);
    const notificationListener = useRef();
    const responseListener = useRef();
    const [newCookies, setNewCookies] = useState('');
    const [webViewUrl, setWebViewUrl] = useState('');
    const jsCode = "document.body.backgroundColor = 'red'; //alert('sa') "

    const [webUrl, setWebUrl] = useState('https://investmoot.com/');

    const _onMessage = (event) => {
        const { data } = event.nativeEvent;
        const cookies = data.split(';'); // `csrftoken=...; rur=...; mid=...; somethingelse=...`

        cookies.forEach((cookie) => {
            const c = cookie.trim().split('=');

            const new_cookies = newCookies;
            new_cookies[c[0]] = c[1];

            setNewCookies({ cookies: new_cookies })

        });

        _checkNeededCookies();
    }

    const onNavigationStateChange = (webViewState) => {
        const { url } = webViewState;

        // when WebView.onMessage called, there is not-http(s) url
        if (url.includes('http')) {
            setWebViewUrl({ webViewUrl: url });
        }
    }


    useEffect(() => {
        registerForPushNotificationsAsync().then(async token => {
            
            setExpoPushToken(token);
            await fetch('https://investmoot.com/mpanel/index.php?route=token&token='+token + '&secure=68acd56ccd828119310ebda41741ea5a1dde1ae2');

        });

        notificationListener.current = Notifications.addNotificationReceivedListener(notification => {
            setNotification(notification);
        });

        responseListener.current = Notifications.addNotificationResponseReceivedListener(response => {
           

            const {type, msg} = notification.data;

            if (type !== "") {

                if (type == 'update') {
                    
                    Linking.openURL("https://play.google.com/store/apps/details?id=com.investmoot");
    
                } else if (type == 'url'){
                    
                    const url = msg;
                    setWebViewUrl(url)

                }
            } else {
                console.log('data yok');
            }
    

        });

        return () => {
            Notifications.removeNotificationSubscription(notificationListener);
            Notifications.removeNotificationSubscription(responseListener);
        };
    }, []);

    return (
        // <View
        //   style={{
        //     flex: 1,
        //     alignItems: 'center',
        //     justifyContent: 'space-around',
        //   }}>
        //   <Text>Your expo push token: {expoPushToken}</Text>
        //   <View style={{ alignItems: 'center', justifyContent: 'center' }}>
        //     <Text>Title: {notification && notification.request.content.title} </Text>
        //     <Text>Body: {notification && notification.request.content.body}</Text>
        //     <Text>Data: {notification && JSON.stringify(notification.request.content.data)}</Text>
        //   </View>
        //   <Button
        //     title="Press to schedule a notification"
        //     onPress={async () => {
        //       await schedulePushNotification();
        //     }}
        //   />
        // </View>

        <View style={styles.container}>
            <WebView
                onNavigationStateChange={onNavigationStateChange}
                onMessage={_onMessage}
                injectedJavaScript={jsCode}
                source={{
                    uri:
                        webUrl,
                }}
            />
        </View>
    );
}

//container styles
const styles = StyleSheet.create({
    container: {
        flex: 1,
        paddingTop: Constants.statusBarHeight,
        backgroundColor: "#00214f"
    },
});


// local olarak her gün bildirim
async function schedulePushNotification() {
    await Notifications.scheduleNotificationAsync({
        content: {
            title: "You've got mail! 📬",
            body: 'Here is the notification body',
            data: { data: 'goes here' },
        },
        trigger: { seconds: 2 },
    });
}

async function registerForPushNotificationsAsync() {
    let token;
    if (Constants.isDevice) {
        const { status: existingStatus } = await Permissions.getAsync(Permissions.NOTIFICATIONS);
        let finalStatus = existingStatus;
        if (existingStatus !== 'granted') {
            const { status } = await Permissions.askAsync(Permissions.NOTIFICATIONS);
            finalStatus = status;
        }
        if (finalStatus !== 'granted') {
            alert('Failed to get push token for push notification!');
            return;
        }
        token = (await Notifications.getExpoPushTokenAsync()).data;
        console.log(token);
    } else {
        alert('Must use physical device for Push Notifications');
    }

    if (Platform.OS === 'android') {
        Notifications.setNotificationChannelAsync('default', {
            name: 'default',
            importance: Notifications.AndroidImportance.MAX,
            vibrationPattern: [0, 250, 250, 250],
            lightColor: '#FF231F7C',
        });
    }

    return token;
}