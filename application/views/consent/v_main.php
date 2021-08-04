<!--
    v_main
    display main page
    @input -
    @output -
    @author Nattakorn
    Create date 2564-07-16
    Update date 2564-07-18
-->
<head>
<style>
.button {
    background-color: #ff0000;
    border-radius: 20px;
    color: white;
    padding: 5px;
    text-align: center;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;

}

body 
{
    background-image: src="../../argon/assets/img/brand/mainBG.JPG" ;
}
.sizepic{
    width : 200px;
    height : 2  00px;
}
#bg_home{
        
        background-image:url("<?php echo base_url()?>pic/pic-home.jpg") ;
        background-attachment: fixed;
        background-position: top center;
        background-repeat: no-repeat;
        background-size: 100% 100%;
    }
#cardbody{
    margin-right : 10%;
}
</style>
</head>

<body id = "bg_home">
    <!-- Sidenav -->
   
    <!-- Main content -->
    <div class="main-content" id="panel">
        <!-- Topnav -->

        <!-- Header -->
        <!-- Header -->
        <div class="header pb-6 d-flex align-items-center"
            style="min-height: 100px;  background-size: cover; background-position: center top;">
            <!-- Mask -->
            <!-- Header container -->

        </div>
        <!-- Page content -->
        <div class="container-fluid mt--6 ">
            <div class="row">

                <div class="col-xl-12 order-xl-1">
                    <div class="card">
                        <!-- <div class="card-header"> -->
                            <!-- <div class="row align-items-center"> -->
                                <div class="col-8">
                                    <!-- <h1 class="mb-0">Temporary Tag Permission System</h1> -->
                                </div>

                            </div>
                        </div>
                        <div  id = "cardbody">
                            
                            <h2 style = "font-size : 25.9px;font-family:Helvetica;color:red;">Welcome <?php echo $_SESSION['UsName_EN'] ?></h2>
                            <br>
                            <h4>ปัจจุบัน ทางบริษัท ได้มีการให้พนักงาน </h4>
                            <h4>ทำการวางของในจุดต่างๆ ตามที่จัดไว้</h4>
                            <h4>ทำให้ต้องมีการขออนุญาตวางของในพื้นที่</h4>
                            <h4>โรงงานชั่วคราวเพื่อให้มีพื้นที่จัดเก็บของชั่วคราว</h4>
                            <h4>ในการรอการจัดการจัดจุดวางของให้เหมาะสม</h4>
                          

                            <!--ปุ่มเพิ่มคำขอ-->
                            <a href='<?php echo site_url() . '/licence_form/licence_input/index/' ?>'>
                            <button class="btn btn-primary" type="button">Start Form</button>
                                <!--เหลือเอากดลิ้งไปหน้าอื่น-->
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>
    </html>