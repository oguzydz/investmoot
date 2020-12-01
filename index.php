<div class="row d-none">
    <div class="col-sm-12 col-md-8 col-lg-8">

        <!-- Bu canvas stream gönderiyor -->
        <canvas id="vcanvas" class="w-100" style="display: none;"></canvas>

        <div class="row">
            <div class="col-sm-12 mb-2">
                <div class="row">
                    <div class="col-sm-7">
                        <h3>Live Studio</h3>
                    </div>
                    <div class="col-sm-2">
                        <button type="button" class="btn btn-danger" id="sol_live_goLiveBut">Go Live
                        </button>
                    </div>
                    <div class="col-sm-3"></div>
                </div>
            </div>
            <div class="col-sm-9">
                <!-- canvasMain -->
                <div id="canvasMain" class="yayin1li">
                    <div id="canvasMainIc">
                        <div id="canvasMainIcWrapper" style="background-color:#21d397; border-radius: 5px">
                            <div class="preview-alert" style="position: absolute; left:0; top:0; margin-left: 30px; margin-top:20px;background-color:rgba(9,30,66,.71); color: white; padding: 10px; border-radius: 10px">
                                PREVIEW
                            </div>

                            <div class="streamol_logo" style="position: absolute; right: 0; top:0; margin-right: 30px; margin-top: 20px; background-color: #46338b; padding: 10px; border-radius: 10px">
                                <img src="https://streamol.com/res/img/streamol_trans_white.png" width="125" height="23" />
                            </div>
                            <div id="canvasLocalVideoWr01" class="canvasLocalVideoWr" style="margin-bottom: -10px;">
                                <video id="canvasLocalVideo" style="width: 75%; height:100%; margin-left: 12.5%" class="canvasMainVideo" muted autoplay playsinline></video>
                            </div>
                            <div id="canvasLocalVideoWr02" class="canvasLocalVideoWr canvasLocalVideoHidden">
                                <video id="canvasLocalVideo2" class="canvasMainVideo" muted autoplay playsinline></video>
                            </div>
                            <div id="canvasLocalVideoWr03" class="canvasLocalVideoWr canvasLocalVideoHidden ">
                                <video id="canvasLocalVideo3" class="canvasMainVideo" muted autoplay playsinline></video>
                            </div>
                            <div id="canvasLocalVideoWr04" class="canvasLocalVideoWr canvasLocalVideoHidden">
                                <video id="canvasLocalVideo4" class="canvasMainVideo" muted autoplay playsinline></video>
                            </div>
                        </div><!-- ///canvasMainIcWrapper -->
                    </div>
                    <div class="clearfix"></div>


                </div>
                <!-- ///canvasMain -->

                <div class="card mt-3 d-flex justify-content-center align-items-center">
                    <div class="card-body">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-secondary">
                                <a style="display: block;" class="text-white" href="#" id="localufakODc3Mzg1NTU0LTE0MzIzahrefaudio" onclick="return sol_live_localvkontrol('audio','off','localufakODc3Mzg1NTU0LTE0MzIz','ODc3Mzg1NTU0LTE0MzIz');"><i class="bx bx-microphone m-auto text-white"></i>
                                    Mute</a>
                            </button>
                            <button type="button" class="btn btn-secondary">Stop Video</button>
                            <button type="button" class="btn btn-secondary">Share Screen</button>
                            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#copy_modal">
                                Add Guests
                            </button>
                            <button type="button" class="btn btn-secondary">Play Local Video</button>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Modal -->
            <div id="copy_modal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-9">
                                        <h3>Copy Invite Link</h3>
                                    </div>
                                    <div class="col-sm-3">
                                        <button type="button" class="close" data-dismiss="modal">
                                            &times;
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="modal-body align-items-center">
                            <div class="form-group">
                                <input type="text" class="form-control" value="https://streamol.com/guest/<?php echo $token; ?>/" id="token">
                            </div>
                            <div class="form-group justify-content-center align-items-center d-flex">
                                <button class="btn btn-primary btn-sm col-sm-3" type="button" id="share_firends" onclick="sol_live_copy_inviteLink()">
                                    Copy
                                </button>
                            </div>
                            <script>
                                function sol_live_copy_inviteLink() {
                                    var copyText = document.getElementById("token");
                                    copyText.select();
                                    copyText.setSelectionRange(0, 99999)
                                    document.execCommand("copy");
                                    alert("Copied the text: " + copyText.value);
                                }
                            </script>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close
                            </button>
                        </div>
                    </div>

                </div>
            </div>


            <div class="card col-sm-3 pt-2 ">
                <div class="cardbody">
                    <div class="row pl-3 pb-2 pull-center">
                        <a href="" onclick="return sol_live_changevideomode();"><i class='bx bx-dock-left' style="font-size:20px;"></i></a>
                        <a href="" onclick="return sol_live_changevideomode();"><i class='bx bx-dock-top pl-1' style="font-size:20px;"></i></a>
                    </div><!-- row -->

                    <div class="" id="sol_live_allVideos">
                    </div>
                </div>
            </div>
        </div><!-- row -->
        <div class="row mt-2">

            <div class="col row" style="display:none;">
                <div class="col">
                    <button type="button" class="btn btn-info border" onclick="sol_live_switchMobileCamera();" id="change_camera">
                        <i class="fas fa-sync"></i>
                        <i class="fas fa-camera"></i>
                    </button>
                </div>
                <div class="col">
                    <button class="btn btn-primary" id="sendOfferButton" onclick="sol_live_createAndSendOffer(connectiona)">
                        Call
                    </button>
                </div>
                <div class="col">
                    <button class="btn btn-primary" id="answerButton" onclick="sol_live_createAndSendAnswer(connectiona)">
                        Answer
                    </button>
                </div>
                <div class="col">
                    <button class="btn btn-primary" id="hangUpButton" onclick="sol_live_disconnectRTCPeerConnection(connectiona)">
                        Hang Up
                    </button>
                    <br /><br />
                </div>
            </div>


        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <!-- Nav pills -->
        <ul class="nav nav-pills bg-white p-2 rounded" role="tablist">
            <li class="nav-item">
                <a class="nav-link" data-toggle="pill" href="#chat">CHAT</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="pill" href="#captions">CAPTIONS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="pill" href="#graphics">GRAPHICS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" data-toggle="pill" href="#setup">SETUP</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div id="chat" class=" tab-pane fade"><br>
                <!-- Chat textarea -->
                <div class="row p-1">
                    <textarea class="form-control w-100 border" style="height: 200px;" readonly id="chatTextArea"></textarea>
                    <input id="messageInput" type="text" class="col-9 form-control-lg form-control-lg border" style="height: 40px; border-radius: 10px 0px 0px 10px!important;" size="80" placeholder="Enter message to send" />
                    <button id="sendMessageButton" onclick="sol_live_sendMessage()" class="col-3 form-control form-control-lg rounded-right btn btn-primary" style="height: 40px;border-radius: 0px 10px 10px 0px!important;" type="button">
                        <i class="fas fa-paper-plane"></i></button>
                </div>
            </div>
            <div id="captions" class=" tab-pane fade"><br>
                <div class="list-group">
                    <a href="#" class="list-group-item disabled">Streamol allows you to stream live to
                        YouTube Channels, for now!</a>
                    <a href="#" class="list-group-item">Keep go on!</a>
                    <a href="#" class="list-group-item">Add your caption which is need to describe your
                        live stream!</a>
                </div>
            </div>
            <div id="graphics" class=" tab-pane fade"><br>
                <div class="list-group">
                    <a href="#" class="list-group-item disabled bg-warning">
                        <img src="https://streamol.com/res/img/streamol_trans_white.png" width="125" height="23" />
                    </a>
                    <a href="#" class="list-group-item bg-light">
                        <img src="https://streamol.com/res/img/streamol_trans_colored.png" width="125" height="23" />
                    </a>
                    <a href="#" class="list-group-item bg-light">
                        <img src="https://streamol.com/res/img/streamol_trans_colored.png" width="125" height="23" />
                    </a>

                </div>
            </div>
            <div id="setup" class=" tab-pane active"><br>


                <div class="card text-white bg-primary d-none" id="stream_alert">
                    <div class="card-body">
                        <h5 class="card-title text-white">Stream was created by Streamol</h5>
                        <p class="card-text">You can tap the go live button right now, happy streams
                            🙌🥳</p>
                        <iframe id="video_iframe" src="https://www.youtube.com/embed/w96uPRLSskc" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" aria-describedby="title" placeholder="Hi, this my stream!">
                                <small id="title" class="form-text text-muted">Update the title on all
                                    your platforms</small>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" placeholder="You are watching my stream on the platform!"></textarea>
                                <small id="description" class="form-text text-muted">The feature is
                                    available on YT. </small>
                            </div>
                            <button type="button" class="btn btn-primary" id="update_all">Update
                            </button>
                        </form>
                    </div>
                </div>


                <div class="card">
                    <div class="card-body">
                        <label>Destinations</label>
                        <small id="title" class="form-text text-muted">Delivery your stream to all
                            platform which is your added the system!</small>

                        <?php

                        if ($queryDestinations->rowCount()) {
                            $resultDestinations = $queryDestinations->fetchAll();
                            foreach ($resultDestinations as $key => $destination) {

                                $destination_id = $destination['destination_id'];
                                // Burada destination'ın özellikleri alınacak!

                                $queryDestinationsTable = $f->db->prepare("SELECT * FROM $f->tb_live_destinations WHERE destination_id=? ");
                                $queryDestinationsTable->execute(array($destination_id));
                                $getDestination = $queryDestinationsTable->fetch(PDO::FETCH_ASSOC);

                                $destination_image = $getDestination['destination_image'];
                                $destination_name = $getDestination['destination_name'];
                                #$channel_name

                                // Destinations Client Bilgileri
                                $queryDestinationKeys = $f->db->prepare("SELECT * FROM $f->tb_live_destinations_key_settings WHERE destination_id=?");
                                $queryDestinationKeys->execute(array($destination_id));
                                $resultDestinationKeys = $queryDestinationKeys->fetch(PDO::FETCH_ASSOC);


                                $client_id = $resultDestinationKeys['client_id'];
                                $api_key = $resultDestinationKeys['api_key'];


                        ?>

                                <div class="card border shadow-none">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <img src="/res/img/destinations/<?php echo $destination_image; ?>" class="col-sm-2 bg-danger rounded" style="width: 32px; height:auto;padding:10px">
                                            <div class="col-sm-6 d-flex justify-content-center align-items-center"><?php echo $destination_name; ?>
                                                - <span id="title_value"></span></div>
                                            <div class="col-sm-2 d-flex justify-content-center">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="toggleDestination_<?php echo $destination_id ?>" checked>
                                                    <label class="custom-control-label" for="toggleDestination_<?php echo $destination_id ?>" style="margin-top: 3px;"></label>
                                                </div>
                                            </div>
                                            <div class="col-sm-2 align-items-center justify-content-center d-flex">
                                                <a role="button" data-toggle="modal" data-target="#event_settings_<?php echo $destination_id ?>" class="btn btn-primary btn-sm text-white"><i class='bx bx-grid-small'></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="event_settings_<?php echo $destination_id ?>" class="modal fade" role="dialog">
                                    <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-sm-9">
                                                            <h3><?php echo $destination_name; ?>
                                                                Settings</h3>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <button type="button" class="close" data-dismiss="modal">
                                                                &times;
                                                            </button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="modal-body align-items-center">
                                                <?php

                                                // YT için şimdilik
                                                if ($destination_id == 4) {


                                                ?>
                                                    <form>
                                                        <div class="form-group">
                                                            <label for="server">Server</label>
                                                            <select class="form-control" id="server_type">
                                                                <option value="1" selected>Primary
                                                                    Server
                                                                </option>
                                                                <option value="2">Backup Server</option>
                                                            </select>
                                                            <small id="server" class="form-text text-muted">Choose
                                                                your YouTube Server</small>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="event">Event</label>
                                                            <select class="form-control" id="event_name">
                                                                <option selected>Create New</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="title_event">Title</label>
                                                            <input type="text" class="form-control" id="title_event" aria-describedby="title_event" value="Get Started Streaming with Streamol.com">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="title_event">Title</label>
                                                            <select id="yt_category" class="form-control" name="yt_events_category">
                                                                <option value="1">Film &amp; Animation
                                                                </option>
                                                                <option value="2">Autos &amp; Vehicles
                                                                </option>
                                                                <option value="10">Music</option>
                                                                <option value="15">Pets &amp; Animals
                                                                </option>
                                                                <option value="17">Sports</option>
                                                                <option value="18">Short Movies</option>
                                                                <option value="19">Travel &amp; Events
                                                                </option>
                                                                <option value="20">Gaming</option>
                                                                <option value="21">Videoblogging
                                                                </option>
                                                                <option value="22">People &amp; Blogs
                                                                </option>
                                                                <option value="23">Comedy</option>
                                                                <option value="24" selected>
                                                                    Entertainment
                                                                </option>
                                                                <option value="25">News &amp; Politics
                                                                </option>
                                                                <option value="26">Howto &amp; Style
                                                                </option>
                                                                <option value="27">Education</option>
                                                                <option value="28">Science &amp;
                                                                    Technology
                                                                </option>
                                                                <option value="29">Nonprofits &amp;
                                                                    Activism
                                                                </option>
                                                                <option value="30">Movies</option>
                                                                <option value="31">Anime/Animation
                                                                </option>
                                                                <option value="32">Action/Adventure
                                                                </option>
                                                                <option value="33">Classics</option>
                                                                <option value="34">Comedy</option>
                                                                <option value="35">Documentary</option>
                                                                <option value="36">Drama</option>
                                                                <option value="37">Family</option>
                                                                <option value="38">Foreign</option>
                                                                <option value="39">Horror</option>
                                                                <option value="40">Sci-Fi/Fantasy
                                                                </option>
                                                                <option value="41">Thriller</option>
                                                                <option value="42">Shorts</option>
                                                                <option value="43">Shows</option>
                                                                <option value="44">Trailers</option>
                                                            </select>
                                                        </div>

                                                        <button type="button" class="btn btn-primary" id="submit_set" data-dismiss="modal">
                                                            Submit
                                                        </button>
                                                    </form>
                                                    <script>
                                                        // değerleri al
                                                        const server = document.querySelector('#server_type').value
                                                        const event = document.querySelector('#event_name')
                                                        const title = document.querySelector('#title_event')
                                                        const category = document.querySelector('#yt_category').value

                                                        const submit_btn = document.querySelector("#submit_set")
                                                        var stream_key;

                                                        var GoogleAuth;
                                                        var SCOPE = 'https://www.googleapis.com/auth/youtube.force-ssl';

                                                        const uye_id = <?php echo $f->oturum ?>;
                                                        const tarih = new Date();

                                                        const current_user = JSON.parse(localStorage.getItem('yt_user'))
                                                        const {
                                                            token_type,
                                                            access_token
                                                        } = current_user.wc;

                                                        const getBroadcastsList = async () => {

                                                            await fetch('https://www.googleapis.com/youtube/v3/liveBroadcasts?broadcastStatus=all&key=' + apiKey, {
                                                                    headers: {
                                                                        'Authorization': 'Bearer ' + access_token,
                                                                        'Accept': 'application/json'
                                                                    }
                                                                })
                                                                .then(res => res.json())
                                                                .then(data => {
                                                                    // önce localstorage'e set et.
                                                                    const {
                                                                        items
                                                                    } = data;

                                                                    console.log(data)

                                                                    localStorage.setItem('current_events', JSON.stringify(items));

                                                                    items.map(item => {
                                                                        const {
                                                                            title,
                                                                            description,
                                                                            channelId,
                                                                        } = item.snippet

                                                                        const createdOption = document.createElement("option")
                                                                        createdOption.text = title;
                                                                        createdOption.value = item.id;

                                                                        event.appendChild(createdOption);
                                                                    })


                                                                })
                                                                .catch(err => console.log("ERROR:", err))
                                                        }

                                                        event.addEventListener('change', () => {
                                                            const cur_val = event.selectedOptions[0].innerText

                                                            if (cur_val == "Create New") {
                                                                const text = "Get Started Streaming with Streamol.com"
                                                                title.value = text
                                                                document.querySelector("#span_value").innerHTML = text
                                                            } else {
                                                                title.value = cur_val
                                                            }

                                                        })

                                                        submit_btn.addEventListener('click', async () => {
                                                            console.log("butona basıldı");
                                                            const selected_status = event.selectedOptions[0].innerText
                                                            if (selected_status == "Create New") {
                                                                // burada yeni ayarlar olacak
                                                                // yeni bir stream başlanacak
                                                                // Post olacak
                                                                // stream'den önce broadcast başlat
                                                                // burada önce broadcasts başlayacak

                                                                insertLiveBroadcasts();

                                                            } else {
                                                                const selected_id = event.selectedOptions[0].value

                                                                const getItems = JSON.parse(localStorage.getItem('current_events'));
                                                                getItems.map((item) => {
                                                                    if (item.id == selected_id) {
                                                                        console.log("EKLE")
                                                                        localStorage.setItem('defined_stream_settings', JSON.stringify(item));
                                                                        item.id
                                                                    }
                                                                })

                                                            }


                                                        })

                                                        const insertLiveBroadcasts = async () => {

                                                            const insertData = {
                                                                "snippet": {
                                                                    "title": title.value,
                                                                    "scheduledStartTime": new Date(),
                                                                    "description": "Streamol.com for all destinations!"
                                                                },
                                                                "contentDetails": {
                                                                    "enableAutoStart": true,
                                                                    "enableAutoStop": true,
                                                                    "enableClosedCaptions": true,
                                                                    "enableContentEncryption": true,
                                                                    "enableDvr": true,
                                                                    "enableMonitorStream": true,
                                                                    "recordFromStart": true,
                                                                    "startWithSlate": true
                                                                },
                                                                "status": {
                                                                    "privacyStatus": "unlisted",
                                                                }
                                                            }

                                                            const data = {
                                                                "snippet": {
                                                                    "title": "Streamol broadcast for live streaming",
                                                                    "scheduledStartTime": "2020-08-18T11:05:48.907Z"
                                                                },
                                                                "contentDetails": {
                                                                    "enableAutoStart": true,
                                                                    "enableAutoStop": true,
                                                                    "enableClosedCaptions": true,
                                                                    "enableContentEncryption": true,
                                                                    "enableDvr": true,
                                                                    "enableMonitorStream": true,
                                                                    "recordFromStart": true,
                                                                    "startWithSlate": true
                                                                },
                                                                "status": {
                                                                    "privacyStatus": "unlisted"
                                                                }
                                                            }

                                                            await fetch('https://content.googleapis.com/youtube/v3/liveBroadcasts?part=snippet%2CcontentDetails%2Cstatus&alt=json&key=' + apiKey, {
                                                                    method: 'POST',
                                                                    headers: {
                                                                        'Authorization': 'Bearer ' + access_token,
                                                                        'Accept': 'application/json',
                                                                        'Content-Type': 'application/json'
                                                                    },
                                                                    body: JSON.stringify(insertData),

                                                                })
                                                                .then(res => res.json())
                                                                .then(res => {
                                                                    console.log("Your brodcast has been created!")
                                                                    document.querySelector('#stream_alert').classList.remove('d-none')
                                                                    document.querySelector('#stream_alert').classList.add('d-block')

                                                                    // video yayını eklendikten sonra bind edilecek
                                                                    // yeni stream üretilebilir

                                                                    const broadCastId = res.id;
                                                                    insertLiveStream(broadCastId);
                                                                    console.log(res)


                                                                })
                                                                .catch(err => console.log("Error: ", err))


                                                        }

                                                        getBroadcastsList();

                                                        const insertLiveStream = async (broadCastId) => {

                                                            const insertLiveStreamData = {
                                                                "snippet": {
                                                                    "title": "Streamol.com Online Streaming",
                                                                    "description": "Streamol.com online streaming to all destinations"
                                                                },
                                                                "cdn": {
                                                                    "frameRate": "60fps",
                                                                    "ingestionType": "rtmp",
                                                                    "resolution": "1080p",
                                                                    "ingestionInfo": {
                                                                        "backupIngestionAddress": "rtmp://b.rtmp.youtube.com/live2?backup=1",
                                                                        "ingestionAddress": "rtmp://a.rtmp.youtube.com/live2",
                                                                        "streamName": "Streamol.com"
                                                                    }
                                                                },
                                                                "contentDetails": {
                                                                    "isReusable": true
                                                                },

                                                                "status": {
                                                                    "streamStatus": "ready"
                                                                }
                                                            }

                                                            await fetch('https://content.googleapis.com/youtube/v3/liveStreams?part=snippet%2Ccdn%2CcontentDetails%2Cstatus&alt=json&&key=' + apiKey, {
                                                                    method: 'POST',
                                                                    headers: {
                                                                        'Authorization': 'Bearer ' + access_token,
                                                                        'Accept': 'application/json',
                                                                        'Content-Type': 'application/json'
                                                                    },
                                                                    body: JSON.stringify(insertLiveStreamData),

                                                                })
                                                                .then(res => res.json())
                                                                .then(res => {
                                                                    console.log("Your stream has been created!")

                                                                    // video yayını eklendikten sonra bind edilecek
                                                                    // yeni stream üretilebilir
                                                                    console.log(res)
                                                                    const iframe = document.getElementById('video_iframe')
                                                                    iframe.src = "https://www.youtube.com/embed/" + broadCastId;
                                                                    localStorage.setItem('stream_key', res.cdn.ingestionInfo.streamName)
                                                                    // Eğer livestream kayıt edilirse burdan dönen stream_id ile id'yi
                                                                    const streamId = res.id
                                                                    bindLiveBroadCast(broadCastId, streamId);
                                                                })
                                                                .catch(err => console.log("Error: ", err))


                                                        }

                                                        const bindLiveBroadCast = async (broadCastId, streamId) => {

                                                            const item = localStorage.getItem('defined_stream_settings');
                                                            const {
                                                                id,
                                                                etag
                                                            } = JSON.stringify(item)

                                                            console.log(JSON.parse(item))

                                                            const fetchUrl = "https://www.googleapis.com/youtube/v3/liveBroadcasts/bind?id=" + broadCastId + "&part=snippet&streamId=" + streamId + "&key=" + apiKey

                                                            await fetch(fetchUrl, {
                                                                    method: 'POST',
                                                                    headers: {
                                                                        'Authorization': 'Bearer ' + access_token,
                                                                        'Accept': 'application/json',
                                                                        'Content-Type': 'application/json'
                                                                    },
                                                                })
                                                                .then(res => res.json())
                                                                .then(async res => {
                                                                    console.log(res)
                                                                    document.querySelector("stream_alert").classList.remove('d-none');
                                                                })
                                                                .catch(err => console.log("Error: ", err))
                                                        }

                                                        const goLive = document.querySelector("#update_all")

                                                        goLive.addEventListener('click', () => {
                                                            bindLiveBroadCast();

                                                        })
                                                    </script>

                                                <?php
                                                } else {
                                                    echo 'This section will be as soon as possible';
                                                } ?>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                                    Close
                                                </button>
                                            </div>

                                        </div>

                                    </div>
                                </div>

                        <?php
                            }
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>