<?php
// app/Http/Controllers/ChatController.php

// app/Http/Controllers/ChatController.php

// app/Http/Controllers/ChatController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatController extends Controller
{
    private $responses = [
        'saludos' => [
            '¡Hola! ¿Cómo puedo ayudarte hoy?',
            '¡Hola! ¿En qué puedo asistirte?',
            '¡Hola! ¿Qué tal? ¿Cómo puedo ayudarte?'
        ],
        'despedida' => [
            '¡Hasta luego! Que tengas un excelente día.',
            '¡Adiós! Espero verte de nuevo pronto.',
            '¡Hasta luego! Cuídate mucho.'
        ],
        'estado' => [
            '¡Genial! ¿Y tú?',
            '¡Todo bien! ¿Y tú?',
            '¡Muy bien! Gracias por preguntar.'
        ],
        'gracias' => [
            '¡De nada! Siempre estoy aquí para ayudarte.',
            '¡A ti! Si necesitas algo más, aquí estoy.',
            '¡Con gusto! No dudes en preguntar más.'
        ],
        'informacion' => [
            'Claro, ¿qué información necesitas?',
            '¿Sobre qué tema necesitas más información?',
            'Estoy aquí para darte la información que necesites.'
        ],

        'reset_password' => [
            'Para restablecer tu contraseña, por favor visita nuestra página de recuperación de contraseña.',
            'Puedes restablecer tu contraseña a través del enlace enviado a tu correo electrónico.',
            'Para ayudar con tu contraseña, por favor accede a la sección de restablecimiento de contraseña en nuestra web.'
        ],
        'contact_whatsapp' => [
            'Puedes contactarnos por WhatsApp al número +123456789. <br><a href="https://wa.me/123456789">enlace</a>',
            'Para asistencia rápida, envíanos un mensaje a nuestro WhatsApp: +123456789. <br><a href="https://wa.me/123456789">enlace</a>',
            'Estamos disponibles en WhatsApp para ayudarte: +123456789. <br><a href="https://wa.me/123456789">enlace</a>'
        ],

        'contact_github' => [
            'Puedes contactarnos a través de GitHub: <a href="https://github.com/xtwgok3">xtwgok3</a>',
            'Para ver nuestros proyectos, visita nuestro perfil de GitHub: <a href="https://github.com/xtwgok3">xtwgok3</a>',
            'Estamos en GitHub, ¡échale un vistazo! <a href="https://github.com/xtwgok3">xtwgok3</a>'
        ],
        
        'contact_linkedin' => [
            'Conéctate con nosotros en LinkedIn: <a href="https://www.linkedin.com/in/carlos-alderete-806409274">Carlos Alderete</a>',
            'Para conocer más sobre nuestro equipo, visita nuestro perfil de LinkedIn: <a href="https://www.linkedin.com/in/carlos-alderete-806409274">Carlos Alderete</a>',
            'Estamos disponibles en LinkedIn, ¡conéctate con nosotros! <a href="https://www.linkedin.com/in/carlos-alderete-806409274">Carlos Alderete</a>'
        ],
        'contact_instagram' => [
            'Síguenos en Instagram: <a href="https://www.instagram.com/">tu_usuario</a>',
            'Para ver nuestras últimas novedades, visita nuestro perfil de Instagram: <a href="https://www.instagram.com/">tu_usuario</a>',
            'Estamos en Instagram, ¡conéctate con nosotros! <a href="https://www.instagram.com/">tu_usuario</a>'
        ],
        

        // --------------------------------ENGLISH --------------------------------------------------------
        'greetings' => [
            'Hello! How can I assist you today?',
            'Hi! What can I help you with?',
            'Hello! How may I help you?'
        ],
        'goodbye' => [
            'Goodbye! Have a great day!',
            'See you later! Hope to see you again soon.',
            'Take care! Bye for now.'
        ],
        'how_are_you' => [
            'I’m great! How about you?',
            'I’m doing well! And you?',
            'All good! Thanks for asking.'
        ],
        'thank_you' => [
            'You’re welcome! I’m here to help you.',
            'No problem! If you need anything else, just ask.',
            'Glad to help! Don’t hesitate to ask more.'
        ],
        'information2' => [
            'Sure, what information do you need?',
            'What topic do you need more information on?',
            'I’m here to provide you with any information you need.'
        ],
        'reset_password2' => [
            'To reset your password, please visit our password recovery page.',
            'You can reset your password using the link sent to your email.',
            'For help with your password, please go to the password reset section on our website.'
        ],
        'contact_whatsapp2' => [
            'You can contact us via WhatsApp at +123456789. <br><a href="https://wa.me/123456789">link</a>',
            'For quick assistance, send us a message on WhatsApp: +123456789. <br><a href="https://wa.me/123456789">link</a>',
            'We are available on WhatsApp to help you: +123456789. <br><a href="https://wa.me/123456789">link</a>'
        ],

        'contact_github2' => [
            'You can contact us via GitHub: <a href="https://github.com/xtwgok3">xtwgok3</a>',
            'To check out our projects, visit our GitHub profile: <a href="https://github.com/xtwgok3">xtwgok3</a>',
            'We’re on GitHub, take a look! <a href="https://github.com/xtwgok3">xtwgok3</a>'
        ],
        
        'contact_linkedin2' => [
            'Connect with us on LinkedIn: <a href="https://www.linkedin.com/in/carlos-alderete-806409274">Carlos Alderete</a>',
            'To learn more about our team, visit our LinkedIn profile: <a href="https://www.linkedin.com/in/carlos-alderete-806409274">Carlos Alderete</a>',
            'We’re available on LinkedIn, connect with us! <a href="https://www.linkedin.com/in/carlos-alderete-806409274">Carlos Alderete</a>'
        ],
        
        'contact_instagram2' => [
            'Follow us on Instagram: <a href="https://www.instagram.com/">your_username</a>',
            'To see our latest updates, visit our Instagram profile: <a href="https://www.instagram.com/">your_username</a>',
            'We’re on Instagram, connect with us! <a href="https://www.instagram.com/">your_username</a>'
        ],
        
    ];

    public function getResponse(Request $request)
    {
        $message = strtolower($request->input('message'));
        $keywords = [
            'hola' => 'saludos',
            'adios' => 'despedida',
            'chau' => 'despedida',
            'como estas' => 'estado',
            'gracias' => 'gracias',
            'informacion' => 'informacion',
            'resetear contraseña' => 'reset_password',
            'contraseña' => 'reset_password',
            'contactar' => 'contact_whatsapp',
            'contacto' => 'contact_whatsapp',
            'whatsapp' => 'contact_whatsapp',
            'ayuda' => 'contact_whatsapp',
            'desarrollador' => 'contact_github',
            'redes' => 'contact_instagram',
            'linkedin' => 'contact_linkedin',



        // --------------------------------ENGLISH --------------------------------------------------------
            'hello' => 'greetings',
            'hi' => 'greetings',
            'goodbye' => 'goodbye',
            'bye' => 'goodbye',
            'cya' => 'goodbye',
            'how are you' => 'how_are_you',
            'howdy' => 'how_are_you',
            'how r u' => 'how_are_you',
            'thank you' => 'thank_you',
            'thank' => 'thank_you',
            'thanks' => 'thank_you',
            'ty' => 'thank_you',
            'information' => 'information2',
            'reset password' => 'reset_password2',
            'contact' => 'contact_whatsapp2',
            'call' => 'contact_whatsapp2',
            'help' => 'contact_whatsapp2',
            'dev' => 'contact_github2',
            'social' => 'contact_instagram2',
            'linkedin' => 'contact_linkedin2',
        ];
    
        $bestMatch = null;
        $highestSimilarity = 0;
    
        foreach ($keywords as $key => $responseType) {
            $similarity = 1 - (levenshtein($message, $key) / max(strlen($message), strlen($key)));
            
            if ($similarity > $highestSimilarity) {
                $highestSimilarity = $similarity;
                $bestMatch = $responseType;
            }
        }
    
        // Establecer un umbral de similitud
        if ($highestSimilarity >= 0.6) { // 70% de coincidencia
            $responsesArray = $this->responses[$bestMatch];
            $response = $responsesArray[array_rand($responsesArray)];
            return response()->json(['response' => $response]);
        }
    
        return response()->json(['response' => 'Lo siento, no entendí tu mensaje. ¿Podrías reformularlo?']);
    }
    

   /* public function getHistory()
{
    // Este es solo un ejemplo. Debes reemplazarlo con la lógica real para obtener el historial.
    $history = [
        ['user_message' => 'Hola', 'bot_response' => '¡Hola! ¿Cómo puedo ayudarte hoy?'],
        ['user_message' => '¿Cómo estás?', 'bot_response' => '¡Genial! ¿Y tú?'],
        ['user_message' => 'Gracias', 'bot_response' => '¡De nada! Siempre estoy aquí para ayudarte.'],
    ];

    return response()->json($history);
}*/

}
