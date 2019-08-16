<?php
/**
 * Created by PhpStorm.
 * User: arjen
 * Date: 8/16/19
 * Time: 2:00 PM
 */

namespace arjenduinhouwer\httprewriter\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class main_listener implements EventSubscriberInterface
{
    /**
     * Returns an array of event names this subscriber wants to listen to.
     *
     * The array keys are event names and the value can be:
     *
     *  * The method name to call (priority defaults to 0)
     *  * An array composed of the method name to call and the priority
     *  * An array of arrays composed of the method names to call and respective
     *    priorities, or 0 if unset
     *
     * For instance:
     *
     *  * array('eventName' => 'methodName')
     *  * array('eventName' => array('methodName', $priority))
     *  * array('eventName' => array(array('methodName1', $priority), array('methodName2')))
     *
     * @return array The event names to listen to
     */
    public static function getSubscribedEvents()
    {
        return
        [
            'core.posting_modify_message_text' => 'check_also'
        ];
    }

    public function check_also($post_data, $second, $third)
    {
        $post_data['message_parser']->message = $this->parseText($post_data['message_parser']->message);
    }

    private function parseText($message)
    {
        if(strpos($message, '[img]http://') !== false)
        {
            $message = str_replace('[img]http://', '[img]https://', $message);
        }

        return $message;
    }
}