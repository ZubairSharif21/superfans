@extends('layouts.main')

@section('content')

<style>
#background-dots {


    width: 265px;
    height: 173px;
    /* background-color: #000; */
    background-image: radial-gradient(circle, #d2b1fa 11%, transparent 12%), radial-gradient(circle, #d2b1fa 12%, transparent 11%);
    background-size: 21px 33px;
    background-position: 0 0, 63px 33px;
    background-repeat: repeat;

}



#background-dots-purchases {
    width: 142px;
    height: 173px;
    /* background-color: #000; */
    background-image: radial-gradient(circle, #d2b1fa 11%, transparent 12%), radial-gradient(circle, #d2b1fa 12%, transparent 11%);
    background-size: 21px 33px;
    background-position: 0 0, 63px 33px;
    background-repeat: repeat;
}





#background-dots-pricing {
    width: 142px;
    height: 251px;
    /* background-color: #000; */
    background-image: radial-gradient(circle, #d2b1fa 11%, transparent 12%), radial-gradient(circle, #d2b1fa 12%, transparent 11%);
    background-size: 21px 33px;
    background-position: 0 0, 63px 33px;
    background-repeat: repeat;
}



@media screen and (max-width: 480px) {
    #download_btn {
        text-align: center !important;
    }


    .safety_equipements_icons {
        width: 50px !important;
    }

}

@media screen and (max-width: 780px) {

    .package_div {
        margin: 20px !important;
    }

    .mobile_builder_text {
        display: block;
    }

    .desktop_builder_text {
        display: none;
    }

    .safety_equipements_icons_parent {
        text-align: left !important;
    }

    .safety_equipements_icons {
        margin: 0 !important;
    }



}

@media screen and (min-width: 781px) {

    .mobile_builder_text {
        display: none;
    }

    .desktop_builder_text {
        display: block;
    }

}


html {
    scroll-behavior: smooth;
}


@media screen and (max-width: 580px) {

    .icon {
        width: 50px !important;
    }


    .icon_child {
        width: 30px !important;
        height: 30px !important;
    }

    .icon_child_parent {
        padding: 5px 5px !important;
        width: min-content !important;
    }

    .parent {
        text-align: center !important;
    }


}

.vest_image {
        margin-top: -3px !important;
        max-width: 91% !important;
    }

@media screen and (max-width: 580px) {


    .vest_image {
        margin-top: -1px !important;
    }

    .shoes_image {
        margin-top: -10px !important;
    }

    .gloves_image {
        max-width: 90% !important;
        margin-left: 12px !important;
        margin-top: 2px !important;
    }


}







@media screen and (max-width: 1200px) and (min-width: 980px) {
  .modal_image {
      max-width: 105.5% !important;
  }
}

@media screen and (max-width: 979px) and (min-width: 550px) {
  .modal_image {
      max-width: 107% !important;
  }
}

@media screen and (max-width: 549px) and (min-width: 500px) {
  .modal_image {
      max-width: 107% !important;
  }
}

@media screen and (max-width: 499px) and (min-width: 450px) {
  .modal_image {
      max-width: 108% !important;
  }
}

@media screen and (max-width: 449px) and (min-width: 400px) {
  .modal_image {
      max-width: 108.5% !important;
  }
}


@media screen and (max-width: 399px) and (min-width: 350px) {
  .modal_image {
      max-width: 111% !important;
  }
}

@media screen and (max-width: 349px) and (min-width: 300px) {
  .modal_image {
      max-width: 112% !important;
  }
}




</style>





<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {

    $("#man_img_div").css("display", "block");
    $("#woman_img_div").css("display", "none");

    $("#male_icon").css("color", "#1c236f");
    $("#female_icon").css("color", "#607095");




    $("#toogle-eyeprotection-on").css("display", "none");
    $("#toogle-eyeprotection-off").css("display", "block");

    $("#toogle-faceprotection-on").css("display", "none");
    $("#toogle-faceprotection-off").css("display", "block");

    $("#toogle-footprotection-on").css("display", "none");
    $("#toogle-footprotection-off").css("display", "block");

    $("#toogle-vest-on").css("display", "none");
    $("#toogle-vest-off").css("display", "inline-block");

    $("#toogle-headprotection-on").css("display", "none");
    $("#toogle-headprotection-off").css("display", "block");

    $("#toogle-hearprotection-on").css("display", "none");
    $("#toogle-hearprotection-off").css("display", "block");

    $("#toogle-handprotection-on").css("display", "none");
    $("#toogle-handprotection-off").css("display", "block");



    $("#male_icon").click(function() {
        $("#man_img_div").css("display", "block");
        $("#woman_img_div").css("display", "none");


        $("#male_icon").css("color", "#1c236f");
        $("#female_icon").css("color", "#607095");


        $("#male").val(1);
        $("#female").val(0);

    });


    $("#female_icon").click(function() {
        $("#woman_img_div").css("display", "block");
        $("#man_img_div").css("display", "none");

        $("#male_icon").css("color", "#607095");
        $("#female_icon").css("color", "#1c236f");


        $("#male").val(0);
        $("#female").val(1);

    });





    // // dynamic logic


    // $(".image_divs").css("display", "none");
    // $(".div_count_1").css("display", "block");



    // $(".img_icon").click(function() {



    //     var id = $(this).attr("id");

    //     $("#modal_hidden_input").val(id);

    //     $(".image_divs").css("display", "none");
    //     $(".div_model_id_" + id + "").css("display", "block");

    // });







    $("#toogle-eyeprotection-on").click(function() {
        $("#toogle-eyeprotection-on").css("display", "none");
        $("#toogle-eyeprotection-off").css("display", "block");

        $(".googles").css("display", "none");

        $("#glasses").val(0);
    });

    $("#toogle-eyeprotection-off").click(function() {
        $("#toogle-eyeprotection-on").css("display", "block");
        $("#toogle-eyeprotection-off").css("display", "none");

        $(".googles").css("display", "block");

        $("#glasses").val(1);
    });


    $("#toogle-faceprotection-on").click(function() {
        $("#toogle-faceprotection-on").css("display", "none");
        $("#toogle-faceprotection-off").css("display", "block");

        $(".face-mask").css("display", "none");

        $("#mask").val(0);
    });

    $("#toogle-faceprotection-off").click(function() {
        $("#toogle-faceprotection-on").css("display", "block");
        $("#toogle-faceprotection-off").css("display", "none");

        $(".face-mask").css("display", "block");

        $("#mask").val(1);
    });


    $("#toogle-footprotection-on").click(function() {
        $("#toogle-footprotection-on").css("display", "none");
        $("#toogle-footprotection-off").css("display", "block");

        $(".shoes").css("display", "none");

        $("#shoes").val(0);
    });

    $("#toogle-footprotection-off").click(function() {
        $("#toogle-footprotection-on").css("display", "block");
        $("#toogle-footprotection-off").css("display", "none");

        $(".shoes").css("display", "block");

        $("#shoes").val(1);
    });


    $("#toogle-vest-on").click(function() {
        $("#toogle-vest-on").css("display", "none");
        $("#toogle-vest-off").css("display", "inline-block");

        $(".vest").css("display", "none");

        $("#vest").val(0);
    });

    // $("#toogle-vest-off").click(function() {
    //     $("#toogle-vest-on").css("display", "block");
    //     $("#toogle-vest-off").css("display", "none");

    //     $(".vest").css("display", "block");
    // });



    $("#toogle-vest-off").on({
        mouseenter: function() {
            $("#vest_colors").css("display", "inline-block");
        }
    });

    $("#vest_group_div").on({
        mouseleave: function() {
            $("#vest_colors").css("display", "none");
        }
    });

    // vest_group_div



    $("#vest_orange").on("click", function() {

        $("#toogle-vest-on").css("display", "block");
        $("#toogle-vest-off").css("display", "none");

        $("#vest_colors").css("display", "none");


        $(".vest_orange").css("display", "block");

        $("#vest").val(1);
    });


    $("#vest_colors").on("click", function() {

        $("#toogle-vest-on").css("display", "block");
        $("#toogle-vest-off").css("display", "none");

        $("#vest_colors").css("display", "none");


        $(".vest_yellow").css("display", "block");

        $("#vest").val(1);
    });





    $("#toogle-headprotection-on").click(function() {
        $("#toogle-headprotection-on").css("display", "none");
        $("#toogle-headprotection-off").css("display", "block");

        $(".helmet").css("display", "none");

        $("#helmet").val(0);
    });

    $("#toogle-headprotection-off").click(function() {
        $("#toogle-headprotection-on").css("display", "block");
        $("#toogle-headprotection-off").css("display", "none");

        $(".helmet").css("display", "block");

        $("#helmet").val(1);
    });


    $("#toogle-hearprotection-on").click(function() {
        $("#toogle-hearprotection-on").css("display", "none");
        $("#toogle-hearprotection-off").css("display", "block");

        $("#headphone").val(0);

    });

    $("#toogle-hearprotection-off").click(function() {
        $("#toogle-hearprotection-on").css("display", "block");
        $("#toogle-hearprotection-off").css("display", "none");

        $("#headphone").val(1);
    });


    $("#toogle-handprotection-on").click(function() {
        $("#toogle-handprotection-on").css("display", "none");
        $("#toogle-handprotection-off").css("display", "block");

        $(".gloves").css("display", "none");

        $("#gloves").val(0);
    });

    $("#toogle-handprotection-off").click(function() {
        $("#toogle-handprotection-on").css("display", "block");
        $("#toogle-handprotection-off").css("display", "none");

        $(".gloves").css("display", "block");

        $("#gloves").val(1);
    });


});
</script>



<script>
$(document).ready(function() {

    $(".parent").hover(function() {
        // $(this).children('div').css("display", "inline-block");
        if ($(this).hasClass("icon_child_parent")) {

            $(this).children('div').css("display", "inline-block");
        } else {
            $(this).children('div').css("display", "block");
        }


    });

    $(".parent").mouseleave(function() {
        $(this).children('div').css("display", "none");
    });




    $(".icon").click(function() {
        var id = $(this).attr('id');

        var parent = $(this).attr('parent');

        // alert("id is : "+id);
        // alert("parent is : "+parent);

        var input_val = $(".input_" + id + "").val();

        $(".icon").each(function() {

            if ($(this).attr("parent") == id) {

                $(".image_" + $(this).attr("id") + "").css("display", "none");
                $(".input_" + $(this).attr("id") + "").val(0);


                // $(".icon_on_"+ $(this).attr("id") +"").css("display", "none");
                // $(".icon_off_"+ $(this).attr("id") +"").css("display", "inline-block");

            }

        });



        if (typeof parent === "undefined") {
            // alert("Value is undefined");

            // Parent items display none block
            if (input_val == 0) {
                // $(this).next().css("display", "inline-block");
                // $(this).css("display", "none");
                // alert("if");
                $(".icon_off_" + id + "").css("display", "none");
                $(".icon_on_" + id + "").css("display", "inline-block");
            } else {
                // $(this).prev().css("display", "inline-block");
                // $(this).css("display", "none");
                // alert("Hello");
                $(".icon_off_" + id + "").css("display", "inline-block");
                $(".icon_on_" + id + "").css("display", "none");
            }



        } else {


            // All child icons display block none
            $(".icon_on").each(function() {

                if ($(this).attr("parent") == parent) {
                    // $(this).css("display","none");
                    id_this_child = $(this).attr("id");

                    $(".icon_off_" + id_this_child + "").css("display", "inline-block");
                    $(".icon_on_" + id_this_child + "").css("display", "none");

                }

            });




            // Child items display none block
            if (input_val == 0) {
                // $(this).next().css("display", "inline-block");
                // $(this).css("display", "none");
                // alert("if");
                $(".icon_off_" + id + "").css("display", "none");
                $(".icon_on_" + id + "").css("display", "inline-block");
            } else {
                // $(this).prev().css("display", "inline-block");
                // $(this).css("display", "none");
                //  alert("else");
                $(".icon_off_" + id + "").css("display", "inline-block");
                $(".icon_on_" + id + "").css("display", "none");
            }



            var child_ids = [];

            $(".parent_" + parent + "").each(function() {
                child_ids.push($(this).attr("id"));
            });

            // var child_ids = $(".parent_"+parent+"").attr("id");

            // alert(child_ids);

            child_ids.forEach(function(item) {
                // alert(item);


                $(".image_" + item + "").css("display", "none");
                $(".input_" + item + "").val(0);

                $(".asset_id_form_" + item + "").remove();

















            });

            // Parent display none

            // $(".image_"+parent+"").css("display", "none");
            //     $(".input_"+parent+"").val(0);




            // if (input_val == 0) {
            //     $(".parent_off_" + parent + "").css("display","none");
            //     $(".parent_on_" + parent + "").css("display","inline-block");

            // } else {
            //     $(".parent_off_" + parent + "").css("display","inline-block");
            //     $(".parent_on_" + parent + "").css("display","none");
            // }



        }





        // alert("Input value is "+ input_val);

        if (input_val == 0) {
            $(".image_" + id + "").css("display", "block");
            $(".input_" + id + "").val(1);

            // alert("assign 1");

        } else {
            $(".image_" + id + "").css("display", "none");
            $(".input_" + id + "").val(0);

            // alert("assign 0");

        }








    });







    // dynamic logic


    $(".image_divs").css("display", "none");
    $(".div_count_1").css("display", "block");



    $(".img_icon").click(function() {



        var id = $(this).attr("id");


        $(".modal_hidden_input").val(id);

        $(".image_divs").css("display", "none");
        $(".div_model_id_" + id + "").css("display", "block");

    });




    $(".icon").click(function() {
        var id = $(this).attr('id');


        var input_val = $(".input_" + id + "").val();

        if (input_val == 0) {
            $(".asset_id_form_" + id + "").remove();

        } else {
            $(".cart_form").append("<input type='hidden' name='assets[]' class='asset_id_form_" + id +
                "' value=" + id + ">");
        }



    });





});
</script>




    
<script>
$(document).ready(function(){
  $(".icon_modal").click(function(){
    var modal_id = $(this).attr('id');

    if($(this).hasClass("icon_modal_off"))
    {
            $(".icon_modal_on").each(function() {

            $(this).css("display", "none");

            });

            $(".icon_modal_off").each(function() {

            $(this).css("display", "inline-block");

            });


            $(".modal_input_general").each(function() {

                $(this).val("0");

            });



      
    } 
    // else if($(this).hasClass("icon_modal_on"))
    // {
    //             $(".icon_modal_on").each(function() {

    //             $(this).css("display", "inline-block");

    //             });

    //             $(".icon_modal_off").each(function() {

    //             $(this).css("display", "none");

    //             });

    //             $(".modal_input_general").each(function() {

    //                 $(this).val("1");

    //             });

        
    // }

    

    var modal_input_val = $(".modal_input_" + modal_id + "").val();
    
 

    if(modal_input_val == 0)
    {
       
        $(".icon_off_modal_" + modal_id + "").css("display", "none");
        $(".icon_on_modal_" + modal_id + "").css("display", "inline-block");
        $(".modal_input_" + modal_id + "").val('1');



    } 
    // else {

       

    //     $(".icon_off_modal_" + modal_id + "").css("display", "inline-block");
    //     $(".icon_on_modal_" + modal_id + "").css("display", "none");
    //     $(".modal_input_" + modal_id + "").val('0');

    // }








  });
});
</script>



@endsection