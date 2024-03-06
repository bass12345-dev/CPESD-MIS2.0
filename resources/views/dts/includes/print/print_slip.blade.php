<!DOCTYPE html>
<html>
    <head>
        <title>Print</title>
        <style>
                    @import url('https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c&family=Protest+Strike&family=Varela+Round&display=swap');
                    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=M+PLUS+Rounded+1c&family=Protest+Strike&family=Varela+Round&display=swap');

                    .top-header {
                        /* height: 120px; */
                        display: flex;
                        flex-direction: row;
                        flex-wrap: wrap;
                        justify-content: center;

                    }

                    /* Left */
                    .left {

                        display: flex;
                        justify-content: center;
                        align-items: center;


                    }

                    .left-logo {

                        /* margin-left: 12px; */
                        margin-bottom: 30px;
                    }

                    img.top-logo {
                        height: 65px;
                        width: 65px;

                    }

                    /* Middle */
                    .middle {

                        /*	flex:1;*/
                        display: flex;
                        flex-direction: column;
                        justify-content: center;
                        align-items: center;
                        /* width: 320px; */
                        line-height: 9px;
                        /* margin-top: 10px; */

                    }

                    .office-city-mayor {
                        text-transform: uppercase;
                        font-weight: bold;
                    }

                    .oro {
                        font-weight: bold;
                    }



                    .middle span {
                        font-family: "Inter", sans-serif;
                        color: #000;
                        font-size: 15px;
                    }


                    p.capital {
                        color: maroon;
                        font-family: "Inter", sans-serif;
                        font-size: 15px;
                    }


                    /* Right */
                    .right {

                        width: 100px;
                        display: flex;
                        justify-content: center;
                        align-items: center;

                    }

                    .bagong-image-card {
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        margin-bottom: 36px;
                        margin-right: -60px;
                    }

                    .bagong-image-card img {

                        margin-left: 10px;
                    }

                    .below-header {
                        font-family: "Inter", sans-serif;
                        text-align: center;
                        font-weight: bold;
                        font-size: 20px;
                        color: #000;
                        margin-bottom: 12px;
                        /*	display: flex;
	align-items: center;
	justify-content: center;*/

                    }
        </style>
    </head>
    <body>
        <?php echo $content; ?>
    </body>
    <script>
        window.print();
    </script>

</html>
