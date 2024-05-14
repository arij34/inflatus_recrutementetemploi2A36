<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Chatbot in PHP | CampCodes</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <style>
        /* Ajoutez le CSS pour les questions */
        .question {
            cursor: pointer;
            color: #007bff;
            font-weight: bold;
            border: 1px solid #ccc;
            padding: 8px;
            margin-bottom: 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="title"> Chatbot en ligne</div>
        <div class="form">
            <div class="bot-inbox inbox">
                <div class="icon">
                    <i class="fas fa-user"></i>
                </div>
                <div class="msg-header">
                    <p>Bonjour, comment puis-je vous aider ?</p>
                </div>
            </div>
        </div>
        <div class="question-container">
            <p>Questions:</p>
            <div class="questions">
                <?php
                // Connexion à la base de données
                $dsn = 'mysql:host=localhost;dbname=kaouther';
                $username = 'root';
                $password = '';

                try {
                    $pdo = new PDO($dsn, $username, $password);
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    // Requête SQL pour sélectionner les questions
                    $query = "SELECT queries FROM chatbot WHERE queries NOT IN ('salut', 'merci')";
                    $stmt = $pdo->query($query);

                    // Affichage des questions
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo '<div class="question">' . $row['queries'] . '</div>';
                    }
                } catch (PDOException $e) {
                    echo "Database Error: " . $e->getMessage();
                }
                ?>
            </div>
        </div>
        <div class="typing-field">
            <div class="input-data">
                <input id="data" type="text" placeholder="Type something here.." required>
                <button id="send-btn">Send</button>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $(".question").on("click", function(){
                var question = $(this).text();
                var message = '<div class="user-inbox inbox"><div class="msg-header"><p>'+ question +'</p></div></div>';
                $(".form").append(message);
                $(".form").scrollTop($(".form")[0].scrollHeight);

                // Requête pour obtenir la réponse du bot
                $.ajax({
                    url: 'message.php',
                    type: 'POST',
                    data: {text: question},
                    success: function(result){
                        var reply = '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p>'+ result +'</p></div></div>';
                        $(".form").append(reply);
                        $(".form").scrollTop($(".form")[0].scrollHeight);
                    }
                });
            });

            $("#send-btn").on("click", function(){
                var value = $("#data").val();
                var msg = '<div class="user-inbox inbox"><div class="msg-header"><p>'+ value +'</p></div></div>';
                $(".form").append(msg);
                $("#data").val('');
                
                $.ajax({
                    url: 'message.php',
                    type: 'POST',
                    data: {text: value},
                    success: function(result){
                        var reply = '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p>'+ result +'</p></div></div>';
                        $(".form").append(reply);
                        $(".form").scrollTop($(".form")[0].scrollHeight);
                    }
                });
            });
        });
    </script>
    
</body>
</html>
