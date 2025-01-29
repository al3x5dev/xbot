<?php

namespace Al3x5\xBot\Entities;

/**
 * Message Entity
 */
class Message extends Base
{

    /** 
     * @var int Identificador único del mensaje dentro de este chat. 
     * En casos específicos, este campo puede ser 0 y el mensaje relevante no será utilizable hasta que se envíe realmente.
     */
    public int $message_id;

    /** 
     * @var int Identificador único de un hilo de mensajes al que pertenece el mensaje; solo para supergrupos. 
     */
    public int $message_thread_id;

    /** 
     * @var User Enviador del mensaje; puede estar vacío para mensajes enviados a canales. 
     */
    public User  $from;

    /** 
     * @var Chat Enviador del mensaje cuando se envía en nombre de un chat. 
     */
    public Chat $sender_chat;

    /** 
     * @var int Número de impulsos añadidos por el usuario si el remitente del mensaje impulsó el chat. 
     */
    public int $sender_boost_count;

    /** 
     * @var User Bot que realmente envió el mensaje en nombre de la cuenta comercial. 
     */
    public User  $sender_business_bot;

    /** 
     * @var int Fecha en que se envió el mensaje en tiempo Unix. 
     */
    public int $date;

    /** 
     * @var string Identificador único de la conexión comercial de la que se recibió el mensaje. 
     */
    public string $business_connection_id;

    /** 
     * @var Chat Chat al que pertenece el mensaje. 
     */
    public Chat $chat;

    /** 
     * @var MessageOrigin Información sobre el mensaje original para mensajes reenviados. 
     */
    //public MessageOrigin $forward_origin;

    /** 
     * @var bool Verdadero si el mensaje se envió a un tema de foro. 
     */
    public bool $is_topic_message;

    /** 
     * @var bool Verdadero si el mensaje es una publicación de canal que se reenvió automáticamente al grupo de discusión conectado. 
     */
    public bool $is_automatic_forward;

    /** 
     * @var Message Mensaje original para respuestas en el mismo chat y hilo de mensajes. 
     */
    public Message $reply_to_message;

    /** 
     * @var ExternalReplyInfo Información sobre el mensaje al que se está respondiendo, que puede provenir de otro chat o tema de foro. 
     */
    //public ExternalReplyInfo $external_reply;

    /** 
     * @var TextQuote Parte del mensaje original que se cita en respuestas. 
     */
    //public TextQuote $quote;

    /** 
     * @var Story Historia original para respuestas a una historia. 
     */
    //public Story $reply_to_story;

    /** 
     * @var User Bot a través del cual se envió el mensaje. 
     */
    public User  $via_bot;

    /** 
     * @var int Fecha en que se editó por última vez el mensaje en tiempo Unix. 
     */
    public int $edit_date;

    /** 
     * @var bool Verdadero si el mensaje no se puede reenviar. 
     */
    public bool $has_protected_content;

    /** 
     * @var bool Verdadero si el mensaje fue enviado por una acción implícita. 
     */
    public bool $is_from_offline;

    /** 
     * @var string Identificador único del grupo de mensajes multimedia al que pertenece este mensaje. 
     */
    public string $media_group_id;

    /** 
     * @var string Firma del autor de la publicación para mensajes en canales. 
     */
    public string $author_signature;

    /** 
     * @var string Texto real del mensaje en UTF-8 para mensajes de texto. 
     */
    public string $text;

    /** 
     * @var array Array de MessageEntity para mensajes de texto, entidades especiales como nombres de usuario, URLs, comandos de bot, etc. 
     */
    public array|MessageEntity $entities;

    /** 
     * @var LinkPreviewOptions Opciones utilizadas para la generación de vista previa de enlaces para el mensaje. 
     */
    //public LinkPreviewOptions $link_preview_options;

    /** 
     * @var string Identificador único del efecto del mensaje añadido al mensaje. 
     */
    public string $effect_id;

    /** 
     * @var Animation Información sobre la animación si el mensaje es una animación. 
     */
    //public Animation $animation;

    /** 
     * @var Audio Información sobre el archivo de audio si el mensaje es un archivo de audio. 
     */
    //public Audio $audio;

    /** 
     * @var Document Información sobre el archivo general si el mensaje es un archivo. 
     */
    //public Document $document;

    /** 
     * @var PaidMediaInfo Información sobre los medios pagados si el mensaje contiene medios pagados. 
     */
    //public PaidMediaInfo $paid_media;

    /** 
     * @var array Array de PhotoSize Tamaños disponibles de la foto si el mensaje es una foto. 
     */
    //public array|PhotoSize $photo;

    /** 
     * @var Sticker Información sobre el sticker si el mensaje es un sticker. 
     */
    //public Sticker $sticker;

    /** 
     * @var Story Información sobre la historia si el mensaje es una historia reenviada. 
     */
    //public Story $story;

    /** 
     * @var Video Información sobre el video si el mensaje es un video. 
     */
    //public Video $video;

    /** 
     * @var VideoNote Información sobre el mensaje de video si el mensaje es una nota de video. 
     */
    //public VideoNote $video_note;

    /** 
     * @var Voice Información sobre el archivo de voz si el mensaje es un mensaje de voz. 
     */
    //public Voice $voice;

    /** 
     * @var string Leyenda para la animación, audio, documento, medios pagados, foto, video o voz. 
     */
    public string $caption;

    /** 
     * @var array Array de MessageEntity para mensajes con una leyenda, entidades especiales que aparecen en la leyenda. 
     */
    public array|MessageEntity $caption_entities;

    /** 
     * @var bool Verdadero si la leyenda debe mostrarse encima del medio del mensaje. 
     */
    public bool $show_caption_above_media;

    /** 
     * @var bool Verdadero si el medio del mensaje está cubierto por una animación de spoiler. 
     */
    public bool $has_media_spoiler;

    /** 
     * @var Contact Información sobre el contacto si el mensaje es un contacto compartido. 
     */
    //public Contact $contact;

    /** 
     * @var Dice Información sobre el dado si el mensaje es un dado con valor aleatorio. 
     */
    //public Dice $dice;

    /** 
     * @var Game Información sobre el juego si el mensaje es un juego. 
     */
    //public Game $game;

    /** 
     * @var Poll Información sobre la encuesta si el mensaje es una encuesta nativa. 
     */
    //public Poll $poll;

    /** 
     * @var Venue Información sobre el lugar si el mensaje es un lugar. 
     */
    //public Venue $venue;

    /** 
     * @var Location Información sobre la ubicación si el mensaje es una ubicación compartida. 
     */
    //public Location $location;

    /** 
     * @var array Array de User Nuevos miembros que fueron añadidos al grupo o supergrupo. 
     */
    public array|User $new_chat_members;

    /** 
     * @var User Información sobre un miembro que fue eliminado del grupo. 
     */
    public User  $left_chat_member;

    /** 
     * @var string Título del chat cambiado a este valor. 
     */
    public string $new_chat_title;

    /** 
     * @var array Array de PhotoSize Nueva foto de chat cambiada a este valor. 
     */
    //public array|PhotoSize $new_chat_photo;

    /** 
     * @var bool Verdadero si la foto del chat fue eliminada. 
     */
    public bool $delete_chat_photo;

    /** 
     * @var bool Verdadero si el grupo ha sido creado. 
     */
    public bool $group_chat_created;

    /** 
     * @var bool Verdadero si el supergrupo ha sido creado. 
     */
    public bool $supergroup_chat_created;

    /** 
     * @var bool Verdadero si el canal ha sido creado. 
     */
    public bool $channel_chat_created;

    /** 
     * @var MessageAutoDeleteTimerChanged Información sobre el cambio de configuración del temporizador de auto-eliminación en el chat. 
     */
    //public MessageAutoDeleteTimerChanged $message_auto_delete_timer_changed;

    /** 
     * @var int El grupo ha sido migrado a un supergrupo con el identificador especificado. 
     */
    public int $migrate_to_chat_id;

    /** 
     * @var int El supergrupo ha sido migrado desde un grupo con el identificador especificado. 
     */
    public int $migrate_from_chat_id;

    /** 
     * @var MaybeInaccessibleMessage Mensaje especificado que fue fijado. 
     */
    //public MaybeInaccessibleMessage $pinned_message;

    /** 
     * @var Invoice Información sobre la factura si el mensaje es una factura para un pago. 
     */
    //public Invoice $invoice;

    /** 
     * @var SuccessfulPayment Información sobre un mensaje de servicio sobre un pago exitoso. 
     */
    //public SuccessfulPayment $successful_payment;

    /** 
     * @var RefundedPayment Información sobre un mensaje de servicio sobre un pago reembolsado. 
     */
    //public RefundedPayment $refunded_payment;

    /** 
     * @var UsersShared Mensaje de servicio: usuarios fueron compartidos con el bot. 
     */
    //public UsersShared $users_shared;

    /** 
     * @var ChatShared Mensaje de servicio: un chat fue compartido con el bot. 
     */
    //public ChatShared $chat_shared;

    /** 
     * @var string Nombre de dominio del sitio web en el que el usuario ha iniciado sesión. 
     */
    public string $connected_website;

    /** 
     * @var WriteAccessAllowed Mensaje de servicio: el usuario permitió que el bot escribiera mensajes. 
     */
    //public WriteAccessAllowed $write_access_allowed;

    /** 
     * @var PassportData Datos de Telegram Passport. 
     */
    //public PassportData $passport_data;

    /** 
     * @var ProximityAlertTriggered Mensaje de servicio: un usuario en el chat activó la alerta de proximidad de otro usuario. 
     */
    //public ProximityAlertTriggered $proximity_alert_triggered;

    /** 
     * @var ChatBoostAdded Mensaje de servicio: el usuario impulsó el chat. 
     */
    //public ChatBoostAdded $boost_added;

    /** 
     * @var ChatBackground Mensaje de servicio: fondo de chat establecido. 
     */
    //public ChatBackground $chat_background_set;

    /** 
     * @var ForumTopicCreated Mensaje de servicio: tema de foro creado. 
     */
    //public ForumTopicCreated $forum_topic_created;

    /** 
     * @var ForumTopicEdited Mensaje de servicio: tema de foro editado. 
     */
    //public ForumTopicEdited $forum_topic_edited;

    /** 
     * @var ForumTopicClosed Mensaje de servicio: tema de foro cerrado. 
     */
    //public ForumTopicClosed $forum_topic_closed;

    /** 
     * @var ForumTopicReopened Mensaje de servicio: tema de foro reabierto. 
     */
    //public ForumTopicReopened $forum_topic_reopened;

    /** 
     * @var GeneralForumTopicHidden Mensaje de servicio: el tema 'General' del foro está oculto. 
     */
    //public GeneralForumTopicHidden $general_forum_topic_hidden;

    /** 
     * @var GeneralForumTopicUnhidden Mensaje de servicio: el tema 'General' del foro está visible. 
     */
    //public GeneralForumTopicUnhidden $general_forum_topic_unhidden;

    /** 
     * @var GiveawayCreated Mensaje de servicio: se creó un sorteo programado. 
     */
    //public GiveawayCreated $giveaway_created;

    /** 
     * @var Giveaway Mensaje de sorteo programado. 
     */
    //public Giveaway $giveaway;

    /** 
     * @var GiveawayWinners Mensaje de sorteo con ganadores públicos completado. 
     */
    //public GiveawayWinners $giveaway_winners;

    /** 
     * @var GiveawayCompleted Mensaje de servicio: un sorteo sin ganadores públicos fue completado. 
     */
    //public GiveawayCompleted $giveaway_completed;

    /** 
     * @var VideoChatScheduled Mensaje de servicio: video chat programado. 
     */
    //public VideoChatScheduled $video_chat_scheduled;

    /** 
     * @var VideoChatStarted Mensaje de servicio: video chat iniciado. 
     */
    //public VideoChatStarted $video_chat_started;

    /** 
     * @var VideoChatEnded Mensaje de servicio: video chat terminado. 
     */
    //public VideoChatEnded $video_chat_ended;

    /** 
     * @var VideoChatParticipantsInvited Mensaje de servicio: nuevos participantes invitados a un video chat. 
     */
    //public VideoChatParticipantsInvited $video_chat_participants_invited;

    /** 
     * @var WebAppData Mensaje de servicio: datos enviados por una Web App. 
     */
    //public WebAppData $web_app_data;

    /** 
     * @var InlineKeyboardMarkup Teclado en línea adjunto al mensaje. 
     */
    //public InlineKeyboardMarkup $reply_markup;



    protected function getEntities(): array
    {
        return [
            'from' => User::class,
            'chat' => Chat::class,
            'entities' => MessageEntity::class,
        ];
    }

    public function isCommand(): bool
    {
        if (isset($this->entities)) {
            return $this->get('entities')->type == 'bot_command';
        }

        return false;
    }
}
