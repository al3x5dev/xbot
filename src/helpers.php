<?php
if (!function_exists('sanatizeMarkdown')) {
    /**
     * Tenga en cuenta:
     * 
     * Cualquier carácter con código entre 1 y 126 inclusive puede 
     * tener un carácter de escape en cualquier lugar con un carácter '\' 
     * precedente, en cuyo caso se trata como un carácter normal y no como 
     * parte del marcado. Esto implica que el carácter '\' normalmente 
     * debe ir precedido de un carácter '\'.
     * 
     * Adentro pre y code entidades, todos los caracteres '`' y '\' deben 
     * ir precedidos de un carácter '\'.
     * 
     * Dentro del (...) Como parte del enlace en línea y la definición 
     * de emoji personalizada, todos los ')' y '\' deben ir precedidos 
     * por un carácter '\'.
     * 
     * En todos los demás lugares, los caracteres '_', '*', '[', ']', '(', ')', 
     * '~', '`', '>', '#', '+', ' -', '=', '|', '{', '}', '.', '!' 
     * debe tener como escape el carácter anterior '\'.
     * 
     * En caso de ambigüedad entre italic y underline entidades __ siempre se 
     * trata con avidez de izquierda a derecha como el principio o el final 
     * de una underline entidad, por lo que en lugar de ___italic underline___ 
     * usar ___italic underline_**__, agregando una entidad vacía en negrita como 
     * separador.
     * 
     * Se debe proporcionar un emoji válido como valor alternativo para el emoji 
     * personalizado. El emoji se mostrará en lugar del emoji personalizado en 
     * lugares donde no se puede mostrar un emoji personalizado (por ejemplo, 
     * notificaciones del sistema) o si el mensaje lo reenvía un usuario no premium. 
     * Se recomienda utilizar el emoji del campo emoji emoji personalizada de la 
     * etiqueta .
     * 
     * Las entidades emoji personalizadas solo pueden ser utilizadas por bots que 
     * compraron nombres de usuario adicionales en Fragment .
     */
    function sanatizeMarkdown($text) {
        $pattern = '/./';
        $replacement = '\\\$1'; // Escapa el carácter encontrado
        return preg_replace($pattern, $replacement, $text);
    }
}