<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css">
    <title>Page Title</title>
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
                    <input type="text" name="login" autofocus required>
                    <input type="password" name="password">
                    <input type="password" name="confirm">
                </div>
            </div>

            <hr>

            <div class="gridCont propBorder">
                <span>Полное имя (ФИО)</span>
                <input type="text" name="FIO">
            </div>

            <div class="GenderCl gridCont propBorder">
                <span>Пол</span>

                <div>
                    <div>
                        <input type="radio" value="мужской" name="gender" id="male">
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
                        <input type="checkbox" id="ruLan" name="ruLan">
                        <label for="ruLan">Русский</label>
                    </div>
                    <div>
                        <input type="checkbox" id="enLan" name="enLan">
                        <label for="enLan">Английский</label>
                    </div>
                    <div>
                        <input type="checkbox" id="gerLan" name="gerLan">
                        <label for="gerLan">Немецкий</label>
                    </div>
                    <div>
                        <input type="checkbox" id="frLan" name="frLan">
                        <label for="frLan">Французский</label>
                    </div>
                    <div>
                        <input type="checkbox" id="spLan" name="spLan">
                        <label for="spLan">Испанский</label>
                    </div>
                    <div>
                        <input type="checkbox" id="itLan" name="itLan">
                        <label for="itLan">Итальянский</label>
                    </div>
                </div>
            </div>

            <div class="gridCont propBorder">
                <span>Сфера дефтельности</span>

                <select name="areasOfActivity">
                    <option value="обучение">обучение</option>
                    <option value="политика">политика</option>
                    <option value="бизнес">бизнес</option>
                    <option value="искуство и творчество">искусство и творчество</option>
                </select>
            </div>

            <div class="gridCont propBorder">
                <span>e-mail</span>
                <input type="email" name="email">
            </div>

            <div class="additionalInfoCl gridCont propBorder">
                <span>Дополнительная информация</span>
                <textarea name="additionalInfo"></textarea>
            </div>

            <div class="buttons">
                <input type="submit" value="Готово">
                <button formaction="index.php">Сброс</button>
            </div>
        </form>
    </div>
</body>
</html>