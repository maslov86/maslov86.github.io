<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>World Bank</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://jqueryui.com/resources/demos/style.css">
    <script type="text/javascript" src="scripts/jquery.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
    $( function() {
        $( "#datepicker" ).datepicker();
    });
    </script>
</head>
<body>
    <header>
        <div class="container">
            <div class="intro">
                <div class="logo">
                    <img src="images/logo.png" alt="WORLD BANK Publications">
                </div>
                <div class="feedback">
                    <div class="phone1">8-800-100-5005</div>
                    <div class="phone2">+7 (3452) 522-000</div>
                </div>
            </div>
            <nav class="header_nav">
                <ul class="header_menu">
                    <li><a href="#">Кредитные карты</a></li>
                    <li><a href="#">Вклады</a></li>
                    <li><a href="#">Дебетовая карта</a></li>
                    <li><a href="#">Страхование</a></li>
                    <li><a href="#">Друзья</a></li>
                    <li><a href="#">Интернет-банк</a></li>
                </ul>
            </nav>
            <ul class="breadcrumbs">
                <li><a href="#">Главная</a></li>
                <li><a href="#">Вклады</a></li>
                <li class="active">Калькулятор</li>
            </ul>
        </div>
    </header>
    <main>
        <div class="container">
            <div class="calc">
                <h2>Калькулятор</h2>
                <form class="calc_form" id="calcForm" action="includes/calc.php" method="POST" >
                    <table>
                        <tr>
                            <td>Дата оформления вклада</td>
                            <td><input type="text" id="datepicker" placeholder="дд.мм.гггг" name="deposit_date" required></td>
                        </tr>
                        <tr>
                            <td>Сумма вклада</td>
                            <td><input class="inputNumber" type="number" min="1000" max="3000000" step="1000" value="1000" name="deposit_sum"></td>
                            <td rowspan="2">
                                <input class="inputRange" type="range" min="1000" max="3000000" step="1000" value="0">
                                <div class="markers">
                                    <span>1 тыс. руб.</span>
                                    <span>3 000 000</span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Срок вклада</td>
                            <td>
                                <select name="deposit_term">
                                    <option value="1" selected>1 год</option>
                                    <option value="2">2 года</option>
                                    <option value="3">3 года</option>
                                    <option value="4">4 года</option>
                                    <option value="5">5 лет</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Пополнение вклада</td>
                            <td>
                                <ul >
                                    <li><label for="no"><input type="radio" id="no" name="deposit_replenishment" value="0" checked>Нет</label></li>
                                    <li><label for="yes"><input type="radio" id="yes" name="deposit_replenishment" value="1">Да</label></li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>Сумма пополнения вклада</td>
                            <td><input class="inputNumber" type="number" min="1000" max="3000000" step="1000" value="1000" name="deposit_replenishment_sum" id="deposit_replenishment_sum"></td>
                            <td rowspan="2">
                                <input class="inputRange" type="range" min="1000" max="3000000" step="1000" value="0" id="deposit_replenishment_sum_range">
                                <div class="markers">
                                    <span>1 тыс. руб.</span>
                                    <span>3 000 000</span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
                    <div class="calc_footer">
                        <input type="submit" value="Рассчитать">
                        <div>Результат: <span id="response"></span></div>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <footer>
        <div class="container">
            <nav class="footer_nav">
                <ul class="footer_menu">
                    <li><a href="#">Кредитные карты</a></li>
                    <li><a href="#">Вклады</a></li>
                    <li><a href="#">Дебетовая карта</a></li>
                    <li><a href="#">Страхование</a></li>
                    <li><a href="#">Друзья</a></li>
                    <li><a href="#">Интернет-банк</a></li>
                </ul>
            </nav>
        </div>
    </footer>
    <script type="text/javascript" src="scripts/script.js"></script>
</body>
</html>