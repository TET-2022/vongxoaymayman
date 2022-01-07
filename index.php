<?php
$rand = 0;
$hoangphuc = rand($rand, 50);
if ($hoangphuc <= 10) {
    $arr = "Hoa tượng trưng cho mùa xuân ở miền Bắc?";
    $result = "Hoa đào";
}
if ($hoangphuc >= 11 && $hoangphuc <= 20) {
    $arr = "Tết Nguyên Đán 2021 hay được còn gọi với cái tên khác là gì?";
    $result = "Tết Tân Sửu";
}
if ($hoangphuc >= 22 && $hoangphuc <= 30) {
    $arr = "Sau khi chúc tết các em nhỏ sẽ nhận được gì?";
    $result = "Lì xì";
}
if ($hoangphuc >= 31 && $hoangphuc <= 40) {
    $arr = "Đây là hoạt động truyền thống mang lại sự may mắn của 2 con vật truyền thuyết biểu tượng của mùa xuân do các vũ công điều khiển.";
    $result = "Múa lân";
}
if ($hoangphuc >= 41 && $hoangphuc <= 50) {
    $arr = "Chúc mừng năm mới trong tiếng anh gọi là “Happy birthday”,”Happy ending” hay “Happy Polla”?";
    $result = "Happy new year";
}
?>
<html>

<head>
    <title>VÒNG QUAY LÌ XÌ TẾT 2021</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, maximum-scale=1.0">
    <link rel="stylesheet" href="/assets/css/main.css" type="text/css" />
    <link type="icon/x-icon" href="favicon.ico" rel="shortcut icon" />
    <script type="text/javascript" src="/assets/js/Winwheel.min.js"></script>
    <script src="/assets/js/TweenMax.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <iframe src="https://www.nhaccuatui.com/mh/background/KTpIOEABzL" width="1" height="1" frameborder="0" allowfullscreen allow="autoplay"></iframe>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="/assets/js/sweetalert.js"></script>
    <link href="/assets/css/sweetalert.css" rel="stylesheet" />
    <style>
        @media all and (max-width: 320px) {
            body {
                background: #e7e7e7;
                background: #000 url('tet.png') center top no-repeat;
            }
        }
    </style>
    <script type='text/javascript'>
        //<![CDATA[
        var pictureSrc = "/assets/imgs/hoamai.png"; //Link ảnh hoa muốn hiển thị trên web
        var pictureWidth = 15; //Chiều rộng của hoa mai or đào
        var pictureHeight = 15; //Chiều cao của hoa mai or đào
        var numFlakes = 10; //Số bông hoa xuất hiện cùng một lúc trên trang web
        var downSpeed = 0.01; //Tốc độ rơi của hoa
        var lrFlakes = 10; //Tốc độ các bông hoa giao động từ bên trai sang bên phải và ngược lại


        if (typeof(numFlakes) != 'number' || Math.round(numFlakes) != numFlakes || numFlakes < 1) {
            numFlakes = 10;
        }

        //draw the snowflakes
        for (var x = 0; x < numFlakes; x++) {
            if (document.layers) { //releave NS4 bug
                document.write('<layer id="snFlkDiv' + x + '"><imgsrc="' + pictureSrc + '" height="' + pictureHeight + '"width="' + pictureWidth + '" alt="*" border="0"></layer>');
            } else {
                document.write('<div style="position:absolute; z-index:9999;"id="snFlkDiv' + x + '"><img src="' + pictureSrc + '"height="' + pictureHeight + '" width="' + pictureWidth + '" alt="*"border="0"></div>');
            }
        }

        //calculate initial positions (in portions of browser window size)
        var xcoords = new Array(),
            ycoords = new Array(),
            snFlkTemp;
        for (var x = 0; x < numFlakes; x++) {
            xcoords[x] = (x + 1) / (numFlakes + 1);
            do {
                snFlkTemp = Math.round((numFlakes - 1) * Math.random());
            } while (typeof(ycoords[snFlkTemp]) == 'number');
            ycoords[snFlkTemp] = x / numFlakes;
        }

        //now animate
        function flakeFall() {
            if (!getRefToDivNest('snFlkDiv0')) {
                return;
            }
            var scrWidth = 0,
                scrHeight = 0,
                scrollHeight = 0,
                scrollWidth = 0;
            //find screen settings for all variations. doing this every time allows for resizing and scrolling
            if (typeof(window.innerWidth) == 'number') {
                scrWidth = window.innerWidth;
                scrHeight = window.innerHeight;
            } else {
                if (document.documentElement && (document.documentElement.clientWidth || document.documentElement.clientHeight)) {
                    scrWidth = document.documentElement.clientWidth;
                    scrHeight = document.documentElement.clientHeight;
                } else {
                    if (document.body && (document.body.clientWidth || document.body.clientHeight)) {
                        scrWidth = document.body.clientWidth;
                        scrHeight = document.body.clientHeight;
                    }
                }
            }
            if (typeof(window.pageYOffset) == 'number') {
                scrollHeight = pageYOffset;
                scrollWidth = pageXOffset;
            } else {
                if (document.body && (document.body.scrollLeft || document.body.scrollTop)) {
                    scrollHeight = document.body.scrollTop;
                    scrollWidth = document.body.scrollLeft;
                } else {
                    if (document.documentElement && (document.documentElement.scrollLeft || document.documentElement.scrollTop)) {
                        scrollHeight = document.documentElement.scrollTop;
                        scrollWidth = document.documentElement.scrollLeft;
                    }
                }
            }
            //move the snowflakes to their new position
            for (var x = 0; x < numFlakes; x++) {
                if (ycoords[x] * scrHeight > scrHeight - pictureHeight) {
                    ycoords[x] = 0;
                }
                var divRef = getRefToDivNest('snFlkDiv' + x);
                if (!divRef) {
                    return;
                }
                if (divRef.style) {
                    divRef = divRef.style;
                }
                var oPix = document.childNodes ? 'px' : 0;
                divRef.top = (Math.round(ycoords[x] * scrHeight) + scrollHeight) + oPix;
                divRef.left = (Math.round(((xcoords[x] * scrWidth) - (pictureWidth / 2)) + ((scrWidth / ((numFlakes + 1) * 4)) * (Math.sin(lrFlakes * ycoords[x]) - Math.sin(3 * lrFlakes * ycoords[x])))) + scrollWidth) + oPix;
                ycoords[x] += downSpeed;
            }
        }

        //DHTML handlers
        function getRefToDivNest(divName) {
            if (document.layers) {
                return document.layers[divName];
            } //NS4
            if (document[divName]) {
                return document[divName];
            } //NS4 also
            if (document.getElementById) {
                return document.getElementById(divName);
            } //DOM (IE5+, NS6+, Mozilla0.9+, Opera)
            if (document.all) {
                return document.all[divName];
            } //Proprietary DOM - IE4
            return false;
        }

        window.setInterval('flakeFall();', 100);
        //]]>
    </script>
</head>

<body onload="cauhoi()" style="background: #000 url('tet.png') center top no-repeat;">
    <style type="text/css">
        body {
            padding-bottom: 20px
        }
    </style><img style="width:650px;position:fixed;z-index:9999;bottom:0px;left:0px" src="/assets/imgs/bottom.png" />
    </scr>
    <script type="text/javascript">
        document.write('<style type="text/css">body{padding-bottom:20px}</style><a href="#"><img style="width: 130px;position:fixed;z-index:9999;top:0;left:0" src="/assets/imgs/xuan.png" _cke_saved_src="/assets/imgs/xuan.png"/></a><a href="#"><img style="width: 150px;position:fixed;z-index:9999;top:0;right:0" src="/assets/imgs/right-hoamai.png"/></a><div style="position:fixed;z-index:9999;bottom:-50px;left:0;width:100%;height:104px;"></div>');
    </script>
    <br /><br /><br /><br />
    <center><img style="width:250px;" src="/assets/imgs/vqmm.jpg" /></center>
    <div align="center">
        <table cellpadding="0" cellspacing="0" border="0">
            <tr>
                <td width="500" height="500" class="the_wheel" align="center" valign="center">
                    <canvas id="canvas" width="454" height="434">
                        <p style="color: white" align="center">Sorry, your browser doesn't support canvas. Please try
                            another.</p>
                    </canvas>
                </td>
                <center><a id="spin_start" class="btn" onClick="startSpin();"><img style="width: 100px;" src="/assets/imgs/quay.png"></a>
                    <br><br>
                    <center><a id="spin_reset" class="btn" onClick="resetWheel();"><img style="width: 105px;" src="https://www.pngrepo.com/download/4361/refresh.png"></a></center>
            </tr>
        </table>
    </div>
    <script>
        var matkhau = "<?php echo $result; ?>";

        function cauhoi() {
            swal({
                title: "Vui lòng trả lời câu hỏi sau để quay lì xì!",
                text: "<?php echo $arr ?> (Gợi ý trả lời: <?php echo $result; ?>)",
                type: "input",
                showCancelButton: true, // Có hiển thị nút cancel không(true = có)
                closeOnConfirm: false, // Có thể tắt popup khi nhấp Ok không (true = có)
                showLoaderOnConfirm: true, // Hiển thị loading khi nhấp vào nút Ok
                animation: "slide-from-top", // Như tên của nó, popup sẽ slide from top
                inputPlaceholder: "<?php echo $result; ?>"
            }, function(inputValue) {
                if (inputValue === false) return false;
                if (inputValue != matkhau) {
                    setTimeout(function() {
                        swal.showInputError("Câu trả lời sai, bạn có thể xem gợi ý trả lời!");
                    }, 2000);
                    return false;
                }
                setTimeout(function() {
                    swal("Mở khoá thành công!", "Hãy đưa chiếc điện thoại cho người muốn nhận lì xì nào!", "success");
                }, 2000);
            });
        }
        //Thông số vòng quay
        let duration = 5; //Thời gian kết thúc vòng quay
        let spins = 15; //Quay nhanh hay chậm 3, 8, 15
        let theWheel = new Winwheel({
            'numSegments': 10, // Chia 8 phần bằng nhau
            'outerRadius': 212, // Đặt bán kính vòng quay
            'textFontSize': 18, // Đặt kích thước chữ
            'rotationAngle': 0, // Đặt góc vòng quay từ 0 đến 360 độ.
            'segments': // Các thành phần bao gồm màu sắc và văn bản.
                [{
                        'fillStyle': '#eae56f',
                        'text': '500k',
                        'textFillStyle': '#ffffff',
                        'fillStyle': '#CD8500',
                        'size': winwheelPercentToDegrees(4)
                    },
                    {
                        'fillStyle': '#89f26e',
                        'text': '100k',
                        'textFillStyle': '#ffffff',
                        'fillStyle': '#AA0000',
                        'size': winwheelPercentToDegrees(18)
                    },
                    {
                        'fillStyle': '#7de6ef',
                        'text': '200k',
                        'textFillStyle': '#ffffff',
                        'fillStyle': '#CD8500',
                        'size': winwheelPercentToDegrees(10)
                    },
                    {
                        'fillStyle': '#e7706f',
                        'text': '1000k',
                        'textFillStyle': '#ffffff',
                        'fillStyle': '#AA0000',
                        'size': winwheelPercentToDegrees(3)
                    },
                    {
                        'fillStyle': '#eae56f',
                        'text': '100k',
                        'textFillStyle': '#ffffff',
                        'fillStyle': '#CD8500',
                        'size': winwheelPercentToDegrees(12)
                    },
                    {
                        'fillStyle': '#89f26e',
                        'text': '50k',
                        'textFillStyle': '#ffffff',
                        'fillStyle': '#AA0000',
                        'size': winwheelPercentToDegrees(15)
                    },
                    {
                        'fillStyle': '#e7706f',
                        'text': '200k',
                        'textFillStyle': '#ffffff',
                        'fillStyle': '#CD8500',
                        'size': winwheelPercentToDegrees(10)
                    },
                    {
                        'fillStyle': '#e7706f',
                        'text': '20k',
                        'textFillStyle': '#ffffff',
                        'fillStyle': '#AA0000',
                        'size': winwheelPercentToDegrees(8)
                    },
                    {
                        'fillStyle': '#e7706f',
                        'text': '100k',
                        'textFillStyle': '#ffffff',
                        'fillStyle': '#CD8500',
                    },
                    {
                        'fillStyle': '#e7706f',
                        'text': '50k',
                        'textFillStyle': '#ffffff',
                        'fillStyle': '#AA0000',
                        'size': winwheelPercentToDegrees(8)
                    }
                ],
            'animation': {
                'type': 'spinToStop',
                'duration': duration,
                'spins': spins,
                'callbackSound': playSound, //Hàm gọi âm thanh khi quay
                'soundTrigger': 'pin', //Chỉ định chân là để kích hoạt âm thanh
                'callbackFinished': alertPrize, //Hàm hiển thị kết quả trúng giải thưởng
            },
            'pins': {
                'number': 32 //Số lượng chân. Chia đều xung quanh vòng quay.
            }
        });

        //Kiểm tra vòng quay
        let wheelSpinning = false;

        //Tạo âm thanh và tải tập tin tick.mp3.
        let audio = new Audio('tick.mp3');

        function playSound() {
            //audio.pause();
            audio.currentTime = 0;
            audio.play();
        }

        //Hiển thị các nút vòng quay
        function statusButton(status) {
            if (status == 1) { //trước khi quay
                document.getElementById('spin_start').removeAttribute("disabled");
                document.getElementById('spin_reset').classList.add("hide");
            } else if (status == 2) { //đang quay
                document.getElementById('spin_start').setAttribute("disabled", false);
                document.getElementById('spin_reset').classList.add("hide");
            } else if (status == 3) { //kết quả
                document.getElementById('spin_reset').classList.remove("hide");
            } else {
                alert('Các giá trị của status: 1, 2, 3');
            }
        }
        statusButton(1);

        //startSpin
        function startSpin() {
            // Ensure that spinning can't be clicked again while already running.
            if (wheelSpinning == false) {
                //CSS hiển thị button
                statusButton(2);

                //Hàm bắt đầu quay
                theWheel.startAnimation();

                //Khóa vòng quay
                wheelSpinning = true;
            }
        }

        //Result
        function alertPrize(indicatedSegment) {
            swal("Chúc mừng!", "Chúc mừng bạn đã nhận được " + indicatedSegment.text + " từ vòng quay. Mau vòi lì xì đi!!", "success");

            //CSS hiển thị button
            statusButton(3);
        }

        //resetWheel
        function resetWheel() {
            //CSS hiển thị button
            statusButton(1);

            theWheel.stopAnimation(false); // Stop the animation, false as param so does not call callback function.
            theWheel.rotationAngle = 0; // Re-set the wheel angle to 0 degrees.
            theWheel.draw(); // Call draw to render changes to the wheel.

            wheelSpinning = false; // Reset to false to power buttons and spin can be clicked again.
        }
    </script>
</body>

</html>