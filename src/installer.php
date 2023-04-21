<?php
if (is_file("./config.php")) {
    die(header("location: ./"));
}
$steps = (!empty($_GET['step'])) ? $_GET['step'] : 1;
$installer_version = "1.0.0b";
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blockify client setup</title>

    <link rel="stylesheet" href="https://unpkg.com/7.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-v4-grid-only@1.0.0/dist/bootstrap-grid.css">
    <style>
        .head-of-body {
            padding: 2em 1em 2em 1em;
            color: white;
            background-color: #2a2a72;
            background-image: linear-gradient(315deg, #2a2a72 0%, #009ffd 74%);

        }

        .setup-icon {
            position: absolute;
            height: 100px;
            top: 70px;
            right: 33px;
        }

        .w-100 {
            width: 100%;
        }

        .mb-1 {
            margin-bottom: 0.5rem;
        }

        body {
            background: #EAEEF1;
            padding-top: 3em;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8" style="margin: 0 auto 0 auto">
                <div class="window active">
                    <div class="title-bar">
                        <div class="title-bar-text">Blockify GUI Setup</div>
                        <div class="title-bar-controls">
                            <button aria-label="Close" disabled></button>
                        </div>
                    </div>

                    <div class="window-body">
                        <ul role="menubar" class="can-hover">
                            <li role="menuitem" tabindex="0" aria-haspopup="true">
                                ไฟล์
                                <ul role="menu">
                                    <li role="menuitem"><a href="#">ตัวแก้ไขปลั๊กอิน</a></li>
                                </ul>
                            </li>
                            <li role="menuitem" tabindex="0" aria-haspopup="true">
                                ช่วยเหลือ
                                <ul role="menu">
                                    <li role="menuitem"><a href="#">คู่มือการติดตั้ง</a></li>
                                    <li role="menuitem"><a href="#">เกี่ยวกับ</a></li>
                                </ul>
                            </li>
                        </ul>
                        <div class="head-of-body">
                            <img class="setup-icon" src="https://i.imgur.com/G69zJG8.png" alt="">
                            <h4 style="margin: 0">Blockify User setup</h4>
                        </div>
                        <div style="padding: 1em">
                            <?php switch ($steps):
                                case "1": ?>
                                    <p>ก่อนเริ่มขึ้นตอนถัดไปโปรดอ่านข้อกำหนดการใช้งานของเรา </p>
                                    <textarea cols="30" rows="10" readonly style="overflow: scroll;min-width: 100%;max-width: 100%">
กรุณาอ่านและทำความเข้าใจรายละเอียดในข้อตกลงและเงื่อนไขการใช้งานนี้โดยละเอียดก่อนกดปุ่ม ‘ตกลง’ ยอมรับข้อตกลงและเงื่อนไขการใช้งานนี้

1. การใช้งานเว็บไซต์
ท่านตกลงและยอมรับข้อกำหนดดังต่อไปนี้

(i)        ปฏิบัติตามกฎหมาย หลักเกณฑ์  ระเบียบ ที่เกี่ยวข้อง ที่มีผลใช้บังคับในปัจจุบันและที่จะมีการแก้ไขหรือเพิ่มเติมในอนาคต

(ii)    การเข้าถึงและ/หรือเข้าใช้งานเว็บไซต์ของบริษัทฯ เป็นการยอมรับข้อกำหนดและเงื่อนไขที่ปรากฏ ณ ขณะที่เข้าถึงหรือใช้งาน และ ที่มีการเปลี่ยนแปลงหรือทำให้เป็นปัจจุบันในแต่ละช่วงเวลาในอนาคตว่ามีผลผูกพันตามกฎหมาย  

(iii)      มีหน้าที่จัดหาอุปกรณ์เพื่อการใช้งานที่ปลอดภัย เช่น ไม่ใช้งานเครื่องมือหรืออุปกรณ์ใดๆ ที่มี การเจลเบรคหรือรูท (Jailbreak / Root) หรือ อื่นใดในทำนองเดียวกัน  

(iv)      มีหน้าที่จัดหาบริการเครือข่ายอินเทอร์เน็ต เครือข่ายโทรศัพท์มือถือ อุปกรณ์ใช้งาน ซอฟต์แวร์ แพลทฟอร์ม (Platform) และ/หรือ บริการอื่นใดจากผู้ให้บริการเหล่านั้น เพื่อทำการติดตั้ง เข้าถึงและใช้งานเว็บไซต์ด้วยค่าใช้จ่ายของตนเอง  และ ปฏิบัติตามเงื่อนไขและข้อตกลงต่างๆ ตามที่ผู้ให้บริการเหล่านั้นกำหนด  ซึ่งเป็นปัจจัยภายนอกที่นอกเหนือการควบคุมของบริษัทฯที่อาจส่งผลกระทบต่อคุณภาพและความสะดวกในการใช้เว็บไซต์นี้

(v)       ข้อมูลที่ท่านได้ให้กับบริษัทฯผ่านการใช้เว็บไซต์นี้ มีความครบถ้วน ถูกต้อง และ เป็นจริง

(vi)      ปรับปรุงบัญชีผู้ใช้งานหรือชื่อผู้ใช้งาน (หากมี) ให้ถูกต้องและตรงต่อความเป็นจริงในปัจจุบันเสมอ

(vii)   เก็บรักษารหัสผ่านเข้าใช้งาน (หากมี) ที่ตั้งขึ้นจะไม่เปิดเผยให้บุคคลอื่นทราบ ในกรณีที่ไม่ปฎิบัติตาม ผู้ใช้งานตกลงรับผิดชอบการกระทำที่เกิดขึ้นกับบัญชีการใช้งานจากการกระทำของบุคคลนั้น
                        </textarea>
                                    <center>
                                        <a href="?step=2"><button class="default">ดำเนินการต่อ</button></a>
                                    </center>

                                <?php break;
                                case "2": ?>
                                    <form action="?step=3" method="post">
                                        <h4>ขั้นตอนที่ 1: กำหนดพารามิเตอร์</h4>
                                        <div class="row" style="padding: 0 2em 1em 2em">
                                            <div class="col-3">
                                                <b>ตั้งค่าฐานข้อมูล MySQL</b>
                                            </div>
                                            <div class="col-9">
                                                <div class="row">
                                                    <div class="col-6 mb-1">
                                                        <div class="field-row-stacked w-100">
                                                            <label for="db_host">โฮสฐานข้อมูล</label>
                                                            <input name="db_host" value="localhost" type="text">
                                                        </div>

                                                    </div>
                                                    <div class="col-6 mb-1">
                                                        <div class="field-row-stacked w-100">
                                                            <label for="db_user">ชื่อผู้ใช้</label>
                                                            <input name="db_user" value="root" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="col-6 mb-1">
                                                        <div class="field-row-stacked w-100">
                                                            <label for="db_pass">รหัสผ่าน</label>
                                                            <input name="db_pass" type="password">
                                                        </div>

                                                    </div>
                                                    <div class="col-6 mb-1">
                                                        <div class="field-row-stacked w-100">
                                                            <label for="db_name">ชื่อฐานข้อมูล</label>
                                                            <input name="db_name" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="col-6 mb-1">
                                                        <div class="field-row-stacked w-100">
                                                            <label for="table_name">ชื่อตาราง</label>
                                                            <input name="table_name" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="padding: 0 2em 0.5em 2em">
                                            <div class="col-3">
                                                <b>ปลั๊กอินสำหรับเข้าสู่ระบบ</b>
                                            </div>
                                            <div class="col-9">
                                                <div class="row">
                                                    <div class="col-6 mb-1">
                                                        <div class="field-row-stacked w-100">
                                                            <label for="text27">ปลั๊กอินที่ติดตั้ง</label>
                                                            <select name="plugin">
                                                                <option value="Authme">Authme</option>
                                                            </select>
                                                        </div>

                                                    </div>
                                                    <div class="col-6 mb-1">
                                                        <div class="field-row-stacked w-100">
                                                            <label for="text28">เข้ารหัส</label>
                                                            <select name="hash">
                                                                <option value="BCRYPT">BCRYPT</option>
                                                                <option value="SHA256">SHA256</option>
                                                                <option value="TEXT">TEXT (ไม่แนะนำ)</option>
                                                            </select>
                                                        </div>
                                                        <small style="color:red">ใส่ให้ตรงกับการตั้งค่าในตัวปลั๊กอิน</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <center>
                                            <a href="?step=1"><button type="button">ย้อนกลับ</button></a>
                                            <button type="submit" class="default">ดำเนินการต่อ</button>
                                        </center>
                                    </form>
                                <?php break;
                                case "3":
                                    if (!empty($_POST)) {
                                        $_POST['client_id'] = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyz"), 0, 10);
                                        $_SESSION['config'] = $_POST;
                                    }
                                    if (empty($_SESSION['config'])) {
                                        header("Location: ./installer.php?step=2");
                                    }
                                    //var_dump($_SESSION['config']);
                                ?>

                                    <h4 style="margin-bottom: 1em;">ขั้นตอนที่ 2: เชื่อมต่อกับเรา</h4>
                                    <p style="margin: 0">นำรหัสที่แสดงในหน้าจอไปยืนยันกับเราที่เมนู <a href="#">ตั้งค่าการเชื่อมต่อ</a> เมื่อบันทึกแล้วให้กดดำเนินการต่อได้เลย</p>
                                    <b id="clientIdText" style="margin: 0;font-size: 22pt"><?= $_SESSION['config']['client_id'] ?></b>
                                    <center>
                                        <a href="?step=2"><button>ย้อนกลับ</button></a>
                                        <a href="?step=4"><button class="default">ดำเนินการต่อ</button></a>
                                    </center>
                                <?php break;
                                case "4":
                                    if (empty($_SESSION['config'])) {
                                        header("Location: ./installer.php?step=2");
                                    }
                                    $fileWrited = false;
                                    $config = $_SESSION['config'];
                                    $filename = "config.php";
                                    $dir = "./";
                                    $configData = [
                                        "DB_HOST" => $config['db_host'],
                                        "DB_USERNAME" => $config['db_user'],
                                        "DB_PASSWORD" => $config['db_pass'],
                                        "DB_NAME" => $config['db_name'],
                                        "TB_NAME" => $config['table_name'],
                                        "MC_PLUGIN" => $config['plugin'],
                                        "HASH_ALGO" => $config['hash'],
                                        "CLIENT_KEY" => $config['client_id'],
                                        "CLIENT_VERSION" => $installer_version,
                                    ];
                                    $data = "<?php\n\n";
                                    foreach ($configData as $key => $value) {
                                        $data .= "define( '" . $key . "', '" . $value . "' );";
                                        $data .= "\n";
                                    }
                                    if (file_put_contents($dir . $filename, $data)) {
                                        $fileWrited = true;
                                    }
                                ?>
                                    <?php if ($fileWrited) : ?>
                                        <h4 style="margin-bottom: 0.5em">สำเร็จแล้ว!!</h4>
                                        <p>เว็บช็อปของเราได้เชื่อมกับเซิร์ฟเวอร์ของคุณแล้ว หากคุณต้องการตั้งค่าใหม่อีกครั้งให้ลบไฟล์ชื่อ <strong>config.php</strong></p>
                                        <p style="margin-bottom: 2em">ขอบคุณที่ใช้บริการของเราครับ</p>
                                    <?php else : ?>
                                        <h4 style="margin-bottom: 0.5em">เขียนไฟล์ไม่สำเร็จ</h4>
                                        <p>เกิดข้อผิดพลาดในการเขียนไฟล์ โปรดลองใหม่อีกครั้ง หากปัญหายังคงอยู่โปรด <a href="#">ติดต่อทีมงาน</a></p>
                                        <center><a href="./installer.php?step=1"><button>ลองใหม่</button></a></center>
                                    <?php endif ?>

                            <?php
                                    break;
                            endswitch; ?>
                            <small style="color: #999">&copy; Blockity 2023</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    </script>
</body>

</html>