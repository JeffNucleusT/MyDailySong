<?php

    class Message
    {
        // Properties
        public $_name_msg;
        public $_email_msg;
        public $_message_msg;

        public function __constructor($name_msg, $email_msg, $message_msg)
        {
            $this->_name_msg = $name_msg;
            $this->_email_msg = $email_msg;
            $this->_message_msg = $message_msg;
        }

        public function createMessage($name_msg, $email_msg, $message_msg)
        {
            try {

                $name_msg = htmlspecialchars(strip_tags($name_msg));
                $email_msg = htmlspecialchars(strip_tags($email_msg));
                $message_msg = nl2br(htmlspecialchars(strip_tags($message_msg)));

                // Destinataire
                $to = "webmessages@mydailysong.net";

                // Sujet
                $subject = "Messages du site web de My Daily Song";

                // Message
                $message = "
                    <html>
                        <head>
                            <title>Messages du site web de My Daily Song</title>
                        </head>
                        <body>
                            <p><b>Voici les messages venant des utilisateurs de mydailysong.net !</b></p><hr>
                            " . $message_msg . "<hr>
                        </body>
                    </html>
                ";

                // Pour les serveus mails qui burgent
                $to_ligne = (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) ? "\n" : "\r\n";
                
                // Entête
                $headers = "From: " . $name_msg . " <" . $email_msg . ">" . $to_ligne;
                $headers .= "Reply-to: " . $name_msg . " <" . $email_msg . ">" . $to_ligne;
                $headers .= "MIME-Version: 1.0" . $to_ligne;
                $headers .= "Content-type: text/html; charset=utf-8" . $to_ligne;
                $headers .= "Content-Transfer-Encoding: 8bit " . $to_ligne;

                // Envoi
                mail($to, $subject, $message, $headers);
                
                return "new_msg_success";

            } catch (Exception $e) {
                return 'Statement Error : ' . $e;
            }

        }

    }

?>