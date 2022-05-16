<script>
        window.onload = function() {
            var d = new Date().getTime();
            document.getElementById("tid").value = d;
        };
    </script>

    <script>
        $(document).ready(function() {
            $(".allow_decimal").on("keypress", function(evt) {
                var self = $(this);
                self.val(self.val().replace(/[^0-9\.]/g, ''));
                if ((evt.which != 46 || self.val().indexOf('.') != -1) && (evt.which < 48 || evt.which > 57)) {
                    evt.preventDefault();
                }
            });

            $('#payable_amountwog').keyup(function(){
                var payable_amount = $('#payable_amountwog').val();
                var gst_type = $('#gst_typewog').val();
                var gst_value = $('#gst_valuewog').val();
                if(!$.isNumeric(gst_value)){
                    gst_value = '0';
                }
                var gst_added = $('#gst_addedwog').val();
                var payment_gross = $('#payment_grosswog').val();
                if($.isNumeric(payable_amount)){
                    gst_added = parseFloat(gst_value);
                    payment_gross = ((parseFloat(payable_amount) + parseFloat(gst_added)).toFixed(2)).toString();
                    $('#gst_addedwog').val(gst_added.toString());
                    $('#payment_grosswog').val(payment_gross);
                }else{
                    $('#gst_addedwog').val('0');
                    $('#payment_grosswog').val('0');
                }
            });
            $('#payable_amountwgcc').keyup(function(){
                var payable_amount = $('#payable_amountwgcc').val();
                var gst_type = $('#gst_typewgcc').val();
                var gst_value = $('#gst_valuewgcc').val();
                if(!$.isNumeric(gst_value)){
                    gst_value = '0';
                }
                var gst_added = $('#gst_addedwgcc').val();
                var payment_gross = $('#payment_grosswgcc').val();
                if($.isNumeric(payable_amount)){
                    gst_added = ((parseFloat(gst_value) / 100) * parseFloat(payable_amount)).toFixed(2);
                    payment_gross = ((parseFloat(payable_amount) + parseFloat(gst_added)).toFixed(2)).toString();
                    $('#gst_addedwgcc').val(gst_added.toString());
                    $('#payment_grosswgcc').val(payment_gross);
                }else{
                    $('#gst_addedwgcc').val('0');
                    $('#payment_grosswgcc').val('0');
                }
            });
            $('#payable_amountwg').keyup(function(){
                var payable_amount = $('#payable_amountwg').val();
                var gst_type = $('#gst_typewg').val();
                var gst_value = $('#gst_valuewg').val();
                if(!$.isNumeric(gst_value)){
                    gst_value = '0';
                }
                var gst_added = $('#gst_addedwg').val();
                var payment_gross = $('#payment_grosswg').val();
                if($.isNumeric(payable_amount)){
                    gst_added = ((parseFloat(gst_value) / 100) * parseFloat(payable_amount)).toFixed(2);
                    payment_gross = ((parseFloat(payable_amount) + parseFloat(gst_added)).toFixed(2)).toString();
                    $('#gst_addedwg').val(gst_added.toString());
                    $('#payment_grosswg').val(payment_gross);
                }else{
                    $('#gst_addedwg').val('0');
                    $('#payment_grosswg').val('0');
                }
            });
            $('#pwogst').click(function(){
                $('#purchase_infowg').val('');
                $('#contact_numberwg').val('');
                $('#payable_amountwg').val('');
                $('#gst_addedwg').val('0');
                $('#payment_grosswg').val('0');
                $('.sub_tab').removeClass('active');
                $('.sub_tab_pan').removeClass('active');
                $(this).parent().addClass('active');
                var target = $(this).data('target');
                $(target).addClass('active');
            });
            $('#pwogst1').click(function(){
                $('#purchase_infowg').val('');
                $('#contact_numberwg').val('');
                $('#payable_amountwg').val('');
                $('#gst_addedwg').val('0');
                $('#payment_grosswg').val('0');
                $('.sub_tab').removeClass('active');
                $('.sub_tab_pan').removeClass('active');
                $(this).parent().addClass('active');
                var target = $(this).data('target');
                $(target).addClass('active');
            });

            $('#pwgst').click(function(){
                $('#purchase_infowog').val('');
                $('#contact_numberwog').val('');
                $("#currency_codewog")[0].selectedIndex = 0;
                $('#payment_grosswog').val('0');
                $('#payable_amountwog').val('');
            });
            $('#pwgs1').click(function(){
                $('#purchase_infowog').val('');
                $('#contact_numberwog').val('');
                $("#currency_codewog")[0].selectedIndex = 0;
                $('#payment_grosswog').val('0');
                $('#payable_amountwog').val('');
            });
        });
    </script>

    <script type="text/javascript">
        try{
            function Activepaypal() {
               $('.main_tab').removeClass('active');
               $('#maintab1').addClass('active');
               $("#paypal").css("display","block");
               $("#ccavenue").css("display","none");
            }
            function Activeccavenue() {
               $('.main_tab').removeClass('active');
               $('#maintab2').addClass('active');
                $("#paypal").css("display","none");
                $("#ccavenue").css("display","block");
            }
        } catch(err) {
            var error =  err.message;
            alert(error)
        }
    </script>