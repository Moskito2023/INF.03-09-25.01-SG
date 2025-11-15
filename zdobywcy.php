<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZDOBYWCY GÓR</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <header>
        <h1>Klub zdobywców gór polskich</h1>
    </header>
    <nav>
        <a href="kwerenda1.png">kwerenda1</a>
        <a href="kwerenda2.png">kwerenda2</a>
        <a href="kwerenda3.png">kwerenda3</a>
        <a href="kwerenda4.png">kwerenda4</a>
    </nav>
    <main>
        <section id="lewy">
            <img src="logo.png" alt="logo zdobywcy">
            <h3>razem z nami:</h3>
            <ul>
                <li>wyjazdy</li>
                <li>szkolenia</li>
                <li>rekreacja</li>
                <li>wypoczynek</li>
                <li>wyzwania</li>
            </ul>
        </section>
        <section id="prawy">
            <h2>Dołącz do naszego zespołu!</h2>
            <p>Wpisz swoje dane do formularza:</p>

            <form action="zdobywcy.php" method="POST">

                <label for="nazwisko">Nazwisko:</label>
                <input type="text" name="nazwisko" required>

                <label for="imie">Imię:</label>
                <input type="text" name="imie" required>

                <label>Funkcja: </label>
                <select name="funkcja" required>
                    <option value="uczestnik">uczestnik</option>
                    <option value="przewodnik">przewodnik</option>
                    <option value="zaopatrzeniowiec">zaopatrzeniowiec</option>
                    <option value="organizator">organizator</option>
                    <option value="ratownik">ratownik</option>
                </select>

                <label>Email: </label>
                <input type="email" name="email" required>

                <button type="submit">Dodaj</button>
            </form>

            <table>
                <tr>
                    <th>Nazwisko</th>
                    <th>Imię</th>
                    <th>Funkcja</th>
                    <th>Email</th>
                </tr>

                <?php
                $conn = mysqli_connect("localhost", "root", "", "zdobywcy");

                if (!empty($_POST['nazwisko']) && !empty($_POST['imie']) && !empty($_POST['funkcja']) && !empty($_POST['email'])) {
                    $nazwisko = $_POST['nazwisko'];
                    $imie = $_POST['imie'];
                    $funkcja = $_POST['funkcja'];
                    $email = $_POST['email'];
                    $kw = "INSERT INTO osoby(nazwisko, imie, funkcja, email) VALUES('$nazwisko','$imie','$funkcja','$email');";
                    mysqli_query($conn, $kw);
                }

                ?>

                <?php
                $kw = "SELECT nazwisko, imie, funkcja, email FROM osoby;";
                $result = mysqli_query($conn, $kw);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['nazwisko'] . "</td>";
                    echo "<td>" . $row['imie'] . "</td>";
                    echo "<td>" . $row['funkcja'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "</tr>";
                }
                mysqli_close($conn)
                    ?>


            </table>
        </section>
    </main>
    <footer>
        <p>Stronę wykonał: Moskito</p>
    </footer>
</body>

</html>