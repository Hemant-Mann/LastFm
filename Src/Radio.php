<?php
namespace LastFm\Src;

use LastFm\Src\Caller\CallerFactory as CallerFactory;
use LastFm\Src\Playlist as Playlist;
/** 
 * Represents a radio and provides different methods to work with radio.
 *
 * @package	LastFm API
 * @author Hemant Mann 
 * @version	1.0
 */
class Radio {
 
  /**
   * Get a list of a radio's playlists on last.fm.
   * 
   * @param string $session sk (Required) : A session key generated by authenticating a user via the authentication protocol. 
   * @param float $speed_multiplier speed_multiplier (Optional) : The rate at which to provide the stream (supported multipliers are 1.0 and 2.0) 
   * @param int $bitrate bitrate (Optional) : What bitrate to stream content at, in kbps (supported bitrates are 64 and 128)
   * @param bool $discovery discovery (Optional) : Whether to request last.fm content with discovery mode switched on.
   * @param bool $rtp rtp (Optional) : Whether the user is scrobbling or not during this radio session (helps content generation)
   * 
   * @static
   * @access  public
   * @throws  Error
   * 
   * @return Playlist
   *
   */
  public static function getPlaylists(Session $session, $speed_multiplier = null, $bitrate = null,  
    $discovery = null, $rtp = null){
    
    $xml = CallerFactory::getDefaultCaller()->signedCall('radio.getPlaylist', array(
      'discovery' => $discovery,
      'rtp' => $rtp,
      'speed_multiplier' => $speed_multiplier,
      'bitrate' => $bitrate), $session);

    return Playlist::fromSimpleXMLElement($xml);
  }
}