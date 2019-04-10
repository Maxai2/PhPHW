<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css">
    <title>Registration page</title>
</head>
<body>
    <div class="wrap">
        <div class="regHeader">
            <span>Регистрация на сервере:</span>
        </div>

        <form method="POST" class="formCl" action="profilePage.php">
            <div class="userSecDet gridCont propBorder">
                <div class="container">
                    <span>Логин</span>
                    <span>Пароль</span> 
                    <span>Подтверждение</span>
                </div>

                <div class="container">
                    <input type="text" name="login" id="login" value='' autofocus required>
                    <input type="password" name="password" id="password" value='' required>
                    <input type="password" name="confirm" id="confirm" value='' oninput="check(this)" required>
                    <script>
                        function check(input) {
                            if (input.value != document.getElementById('password').value) {
                                input.setCustomValidity('Пароли должны совпадать.');
                            } else {
                                input.setCustomValidity('');
                            }
                        }
                    </script>
                </div>
            </div>

            <hr>

            <div class="gridCont propBorder">
                <span>Полное имя (ФИО)</span>
                <input type="text" name="FIO" id="FIO" value='' required>
            </div>

            <div class="GenderCl gridCont propBorder">
                <span>Пол</span>

                <div>
                    <div>
                        <input type="radio" value="мужской" name="gender" id="male" checked> 
                        <label for="male">мужской</label>
                    </div>
                    <div>
                        <input type="radio" value="женский" name="gender" id="female">
                        <label for="female">женский</label>
                    </div>
                </div>
            </div>
 
            <div class="foreignLanCl gridCont propBorder">
                <span>Иностранные языки</span>

                <div class="languageCont">
                    <div>
                        <input type="checkbox" id="ruLan" name="lang[]" value="Русский">
                        <label for="ruLan">Русский</label>
                    </div>
                    <div>
                        <input type="checkbox" id="enLan" name="lang[]" value="Английский">
                        <label for="enLan" >Английский</label>
                    </div>
                    <div>
                        <input type="checkbox" id="gerLan" name="lang[]" value="Немецкий">
                        <label for="gerLan">Немецкий</label>
                    </div>
                    <div>
                        <input type="checkbox" id="frLan" name="lang[]" value="Французский">
                        <label for="frLan">Французский</label>
                    </div>
                    <div>
                        <input type="checkbox" id="spLan" name="lang[]" value="Испанский">
                        <label for="spLan">Испанский</label>
                    </div>
                    <div>
                        <input type="checkbox" id="itLan" name="lang[]" value="Итальянский">
                        <label for="itLan">Итальянский</label>
                    </div>
                </div>
            </div>

            <div class="gridCont propBorder">
                <span>Сфера дефтельности</span>

                <select name="areasOfActivity" id="areasOfActivity">
                    <option value="обучение">обучение</option>
                    <option value="политика">политика</option>
                    <option value="бизнес">бизнес</option>
                    <option value="искуство и творчество">искусство и творчество</option>
                </select>
            </div>

            <div class="gridCont propBorder">
                <span>E-mail</span>
                <input type="email" name="email" id="email" required>
            </div>

            <div class="additionalInfoCl gridCont propBorder">
                <span>Дополнительная информация</span>
                <textarea name="additionalInfo" id="additionalInfo"></textarea>
            </div>
            
            <div class="buttons">
                <input type="submit" value="Готово">
                <button type="button" onclick="resetVal()">Сброс</button>
                <script>
                    function resetVal() {
                        document.getElementById('login').value = '';
                        document.getElementById('password').value = '';
                        document.getElementById('confirm').value = '';
                        document.getElementById('FIO').value = '';
                        document.getElementById('male').checked = true;

                        document.getElementById('ruLan').checked = false;
                        document.getElementById('enLan').checked = false;
                        document.getElementById('gerLan').checked = false;
                        document.getElementById('frLan').checked = false;
                        document.getElementById('spLan').checked = false;
                        document.getElementById('itLan').checked = false;

                        document.getElementById('areasOfActivity').selectedIndex = 0;
                        document.getElementById('email').value = '';
                        document.getElementById('additionalInfo').value = '';
                    }
                </script>
            </div>

        </form>
    </div>
</body>
</html>