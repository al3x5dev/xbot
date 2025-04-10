<?php

namespace Al3x5\xBot;

use Al3x5\xBot\Entities\{
    Chat,
    ChatMember,
    File,
    InlineQueryResult,
    Message,
    Sticker,
    Update,
    User,
    WebhookInfo
};

/**
 * Enumeración de métodos de la API de Telegram con sus tipos de respuesta
 * Documentación oficial: https://core.telegram.org/bots/api
 * Versión 6.9+
 */
enum TelegramMethod: string
{
        // Métodos que devuelven Message
    case sendMessage = 'sendMessage';
    case sendPhoto = 'sendPhoto';
    case sendAudio = 'sendAudio';
    case sendDocument = 'sendDocument';
    case sendVideo = 'sendVideo';
    case sendAnimation = 'sendAnimation';
    case sendVoice = 'sendVoice';
    case sendVideoNote = 'sendVideoNote';
    case sendMediaGroup = 'sendMediaGroup';
    case sendLocation = 'sendLocation';
    case sendVenue = 'sendVenue';
    case sendContact = 'sendContact';
    case sendPoll = 'sendPoll';
    case sendDice = 'sendDice';
    case sendInvoice = 'sendInvoice';
    case sendGame = 'sendGame';
    case forwardMessage = 'forwardMessage';
    case copyMessage = 'copyMessage';

        // Métodos que devuelven User
    case getMe = 'getMe';

        // Métodos que devuelven Chat
    case getChat = 'getChat';
    case leaveChat = 'leaveChat';
    case getChatAdministrators = 'getChatAdministrators';

        // Métodos que devuelven Update[]
    case getUpdates = 'getUpdates';

        // Métodos que devuelven File
    case getFile = 'getFile';

        // Métodos booleanos
    case answerCallbackQuery = 'answerCallbackQuery';
    case setWebhook = 'setWebhook';
    case deleteWebhook = 'deleteWebhook';
    case deleteMessage = 'deleteMessage';
    case pinChatMessage = 'pinChatMessage';
    case unpinChatMessage = 'unpinChatMessage';
    case setChatTitle = 'setChatTitle';
    case setChatDescription = 'setChatDescription';
    case setChatPermissions = 'setChatPermissions';
    case banChatMember = 'banChatMember';
    case unbanChatMember = 'unbanChatMember';
    case restrictChatMember = 'restrictChatMember';
    case promoteChatMember = 'promoteChatMember';
    case answerShippingQuery = 'answerShippingQuery';
    case answerPreCheckoutQuery = 'answerPreCheckoutQuery';

        // Métodos que devuelven string
    case exportChatInviteLink = 'exportChatInviteLink';
    case createChatInviteLink = 'createChatInviteLink';
    case revokeChatInviteLink = 'revokeChatInviteLink';

        // Métodos que devuelven arrays de objetos
    case getStickerSet = 'getStickerSet';

        // Métodos de edición
    case editMessageText = 'editMessageText';
    case editMessageCaption = 'editMessageCaption';
    case editMessageMedia = 'editMessageMedia';
    case editMessageLiveLocation = 'editMessageLiveLocation';
    case stopMessageLiveLocation = 'stopMessageLiveLocation';
    case editMessageReplyMarkup = 'editMessageReplyMarkup';

        // Métodos de Inline Mode
    case answerInlineQuery = 'answerInlineQuery';

        // Métodos de webhooks
    case getWebhookInfo = 'getWebhookInfo';

        // Métodos de stickers
    case setStickerPositionInSet = 'setStickerPositionInSet';
    case deleteStickerFromSet = 'deleteStickerFromSet';
    case uploadStickerFile = 'uploadStickerFile';
    case createNewStickerSet = 'createNewStickerSet';
    case addStickerToSet = 'addStickerToSet';
    case sendSticker = 'sendStickert';

        // Métodos de comandos
    case setMyCommands = 'setMyCommands';
    case deleteMyCommands = 'deleteMyCommands';
    case getMyCommands = 'getMyCommands';

        // Métodos de reacciones
    case setMessageReaction = 'setMessageReaction';

    public function isCollection(): bool
    {
        return match ($this) {
            self::getChatAdministrators,
            self::getUpdates => true,
            default => false
        };
    }

    public function isPrimitive(): bool
    {
        return match ($this) {
            self::answerCallbackQuery,
            self::setWebhook,
            self::deleteWebhook,
            self::deleteMessage,
            self::pinChatMessage,
            self::unpinChatMessage,
            self::setChatTitle,
            self::setChatDescription,
            self::setChatPermissions,
            self::banChatMember,
            self::unbanChatMember,
            self::restrictChatMember,
            self::promoteChatMember,
            self::answerShippingQuery,
            self::answerPreCheckoutQuery,
            self::setStickerPositionInSet,
            self::deleteStickerFromSet,
            self::createNewStickerSet,
            self::addStickerToSet,
            self::sendSticker,
            self::setMyCommands,
            self::deleteMyCommands,
            self::setMessageReaction => true,
            default => false
        };
    }

    public function getEntityClass(): string
    {
        return match ($this) {
            // Message
            self::sendMessage,
            self::sendPhoto,
            self::sendAudio,
            self::sendDocument,
            self::sendVideo,
            self::sendAnimation,
            self::sendVoice,
            self::sendVideoNote,
            self::sendMediaGroup,
            self::sendLocation,
            self::sendVenue,
            self::sendContact,
            self::sendPoll,
            self::sendDice,
            self::sendInvoice,
            self::sendGame,
            self::forwardMessage,
            self::copyMessage => Message::class,

            // User
            self::getMe => User::class,

            // Chat
            self::getChat => Chat::class,

            // Update[]
            self::getUpdates => Update::class,

            // File
            self::getFile => File::class,

            // WebhookInfo
            self::getWebhookInfo => WebhookInfo::class,

            // StickerSet
            self::getStickerSet => Sticker::class,

            // ChatMember[]
            self::getChatAdministrators => ChatMember::class,

            // InlineQueryResult[]
            self::answerInlineQuery => InlineQueryResult::class,

            default => throw new \InvalidArgumentException("Type not mapped to: " . $this->value)
        };
    }
}