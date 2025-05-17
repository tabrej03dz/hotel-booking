
<!doctype html>
<html>

<head>
    <title>Checkout Demo</title>
    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1" />
    <script src="https://www.paynimo.com/paynimocheckout/client/lib/jquery.min.js" type="text/javascript"></script>
</head>

<body>


    <button id="btnSubmit">Proceed to Pay</button>

    <script type="text/javascript" src="https://www.paynimo.com/paynimocheckout/server/lib/checkout.js"></script>

{{--    <script type="text/javascript">--}}
{{--        $(document).ready(function() {--}}
{{--            function handleResponse(res) {--}}
{{--                if (typeof res != "undefined" && typeof res.paymentMethod != "undefined" && typeof res.paymentMethod.paymentTransaction != "undefined" && typeof res.paymentMethod.paymentTransaction.statusCode != "undefined" && res.paymentMethod.paymentTransaction.statusCode == "0300") {--}}
{{--                    // success block--}}
{{--                } else if (typeof res != "undefined" && typeof res.paymentMethod != "undefined" && typeof res.paymentMethod.paymentTransaction != "undefined" && typeof res.paymentMethod.paymentTransaction.statusCode != "undefined" && res.paymentMethod.paymentTransaction.statusCode == "0398") {--}}
{{--                    // initiated block--}}
{{--                } else {--}}
{{--                    // error block--}}
{{--                }--}}
{{--            };--}}

{{--            $(document).off("click", "#btnSubmit").on("click", "#btnSubmit", function(e) {--}}
{{--                e.preventDefault();--}}

{{--                var reqJson = {--}}
{{--                    "features": {--}}
{{--                        "enableAbortResponse": true,--}}
{{--                        "enableExpressPay": true,--}}
{{--                        "enableInstrumentDeRegistration" : true,--}}
{{--                        "enableMerTxnDetails": true--}}
{{--                    },--}}
{{--                    "consumerData": {--}}
{{--                        "deviceId": "WEBSH2",    //possible values "WEBSH1" or "WEBSH2"--}}
{{--                        "token": "e04be9ed85f134a8ca30f609dca6c1f36e742762590daf6ed6edda06275f378a2147f6244ca2295d134beba1e98c6e67140577893b99e6bd34c09d3f2350519c",--}}
{{--                        "returnUrl": "https://pgproxyuat.in.worldline-solutions.com/linuxsimulator/MerchantResponsePage.jsp",    //merchant response page URL--}}
{{--                        "responseHandler": handleResponse,--}}
{{--                        "paymentMode": "all",--}}
{{--                        "merchantLogoUrl": "{{ asset('asset/logo1.png') }}",  //provided merchant logo will be displayed--}}
{{--                        "merchantId": "L3348",--}}
{{--                        "currency": "INR",--}}
{{--                        "consumerId": "c964634",--}}
{{--                        "txnId": "1708068696283",   //Unique merchant transaction ID--}}
{{--                        "items": [{--}}
{{--                            "itemId": "first",--}}
{{--                            "amount": "1",--}}
{{--                            "comAmt": "0"--}}
{{--                        }],--}}
{{--                        "customStyle": {--}}
{{--                            "PRIMARY_COLOR_CODE": "#45beaa",   //merchant primary color code--}}
{{--                            "SECONDARY_COLOR_CODE": "#FFFFFF",   //provide merchant's suitable color code--}}
{{--                            "BUTTON_COLOR_CODE_1": "#2d8c8c",   //merchant's button background color code--}}
{{--                            "BUTTON_COLOR_CODE_2": "#FFFFFF"   //provide merchant's suitable color code for button text--}}
{{--                        }--}}
{{--                    }--}}
{{--                };--}}

{{--                $.pnCheckout(reqJson);--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var configJson = {
                tarCall: false,
                features: {
                    showPGResponseMsg: true,
                    enableNewWindowFlow: false
                },
                consumerData: {
                    deviceId: "WEBSH1",
                    token: "{{ $token }}",
                    merchantId: "{{ env('WORLDLINE_MERCHANT_ID') }}",
                    currency: "INR",
                    consumerId: "{{ $user->id }}",
                    consumerMobileNo: "{{ $user->phone }}",
                    consumerEmailId: "{{ $user->email }}",
                    txnId: "{{ $transactionId }}",
                    items: [{
                        itemId: "ROOM_BOOKING",
                        amount: "{{ number_format($total, 2, '.', '') }}",
                        comAmt: "0"
                    }],
                    returnUrl: "{{ env('WORLDLINE_RETURN_URL') }}",
                    customStyle: {
                        PRIMARY_COLOR_CODE: "#45beaa",
                        SECONDARY_COLOR_CODE: "#FFFFFF",
                        BUTTON_COLOR_CODE_1: "#2d8c8c",
                        BUTTON_COLOR_CODE_2: "#FFFFFF"
                    }
                }
            };

            $.pnCheckout(configJson);
            if (configJson.features.enableNewWindowFlow) {
                pnCheckoutShared.openNewWindow();
            }
        });
    </script>

</body>

</html>
Live Code Preview
