<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

set_time_limit(0);

class Smiles extends Website_Controller
{
    public function index()
    {
        $this->emotions();
    }

    public function emotions()
    {
        $emoticons = array();

        $emoticons[] = '0:-) angel.gif';
        $emoticons[] = ':) smile.gif';
        $emoticons[] = ':( sad.gif';
        $emoticons[] = ';) wink.gif';
        $emoticons[] = ':P blum3.gif';
        $emoticons[] = '8) dirol.gif';
        $emoticons[] = '@= bomb.gif';
        $emoticons[] = ':diablo: diablo.gif';
        $emoticons[] = ':music: music2.gif';
        $emoticons[] = '*KISSED* air_kiss.gif';
        $emoticons[] = '*TIRED* boredom.gif';
        $emoticons[] = '*STOP* stop.gif';
        $emoticons[] = '*KISSING* kiss_3.gif';
        $emoticons[] = '*GOOD* good.gif';
        $emoticons[] = '*DRINK* drinks.gif';
        $emoticons[] = '*IN_LOVE* man_in_love.gif';
        $emoticons[] = ':WACKO: wacko.gif';
        $emoticons[] = '*WASSUP* mamba.gif';
        $emoticons[] = '*BRAVO* clapping.gif';
        $emoticons[] = '*ROFL* rofl.gif';
        $emoticons[] = '*PARDON* pardon.gif';
        $emoticons[] = '*NO* nea.gif';
        $emoticons[] = '*LOL* lol.gif';
        $emoticons[] = '*CRAZY* crazy.gif';
        $emoticons[] = '*DONT_KNOW* dntknw.gif';
        $emoticons[] = '*SORRY* sorry2.gif';
        $emoticons[] = '*YAHOO* yahoo.gif';
        $emoticons[] = '*DANCE* dance4.gif';
        $emoticons[] = '*db* pleasantry.gif';
        $emoticons[] = '*HAPPY* i-m_so_happy.gif';
        $emoticons[] = '*HELP* help.gif';
        $emoticons[] = '/m/ new_russian.gif';
        $emoticons[] = '*OK* ok.gif';
        $emoticons[] = '*ACUTE* acute.gif';
        $emoticons[] = '*BB* bb.gif';
        $emoticons[] = '*BYE* bye.gif';
        $emoticons[] = '*HI* hi.gif';
        $emoticons[] = '*SCRATCH* scratch_one-s_head.gif';
        $emoticons[] = '*YES!* yes2.gif';
        $emoticons[] = '*SMOKE* smoke.gif';
        $emoticons[] = '*BOSS* big_boss.gif';
        $emoticons[] = '*SARCASTIC* sarcastic.gif';
        $emoticons[] = '*BOAST* boast.gif';
        $emoticons[] = '*HOHO* prankster2.gif';
        $emoticons[] = '*SHOUT* shout.gif';
        $emoticons[] = '*VAVA* black_eye.gif';
        $emoticons[] = '*SEARCH* search.gif';
        $emoticons[] = '*BEACH* beach.gif';
        $emoticons[] = '*FOCUS* focus.gif';
        $emoticons[] = '*HUNTER* hunter.gif';
        $emoticons[] = '*GIRL_CRY* girl_cray2.gif';
        $emoticons[] = '*GIRL_CRAZY* girl_crazy.gif';
        $emoticons[] = '*HOSPITAL* girl_hospital.gif';
        $emoticons[] = '*GIRL_IN_LOVE* girl_in_love.gif';
        $emoticons[] = '*PINKGLASSES* girl_pinkglassesf.gif';
        $emoticons[] = '*HYSTERIC* hysteric.gif';
        $emoticons[] = '*TENDER* tender.gif';
        $emoticons[] = '*SPRUSE_UP* spruce_up.gif';
        $emoticons[] = '*FLIRT* flirt.gif';
        $emoticons[] = '*GIVE_HEART* give_heart.gif';
        $emoticons[] = '*CURTSEY* curtsey.gif';
        $emoticons[] = '*GIRL_DRINK* girl_drink1.gif';
        $emoticons[] = '*HAHA* girl_haha.gif';
        $emoticons[] = '*IMPOSSIBLE* girl_impossible.gif';
        $emoticons[] = '*SIGH* girl_sigh.gif';
        $emoticons[] = '*MOIL* moil.gif';
        $emoticons[] = '*YES* yes3.gif';
        $emoticons[] = '*MEGA_SHOK* swoon2.gif';
        $emoticons[] = '*THANK* thank_you.gif';
        $emoticons[] = '*KING* king.gif';
        $emoticons[] = '*LAZY* lazy.gif';
        $emoticons[] = '*FRIEND* friends.gif';
        $emoticons[] = '*PUNISH* punish.gif';
        $emoticons[] = '*WIZARD* wizard.gif';
        $emoticons[] = '*V* victory.gif';
        $emoticons[] = '*SPITEFUL* spiteful.gif';
        $emoticons[] = '*TEASE* tease.gif';
        $emoticons[] = '*SCARE* scare.gif';
        $emoticons[] = '*THIS* this.gif';
        $emoticons[] = '*PAINT* paint2.gif';
        $emoticons[] = '*TRAINING* training1.gif';
        $emoticons[] = '*PARTY* party2.gif';
        $emoticons[] = '*HELLO* preved.gif';
        $emoticons[] = '*MAIL* mail1.gif';
        $emoticons[] = '*WALL* dash1.gif';
        $emoticons[] = '*VAMPIRE* vampire.gif';
        $emoticons[] = '*GAMER* gamer4.gif';
        $emoticons[] = '*POPCORN* popcorm1.gif';
        $emoticons[] = '*IREFUL* ireful1.gif';

        $aliases = array();
        $aliases[] = ':-) smile.gif';
        $aliases[] = ':-( sad.gif';
        $aliases[] = ';-) wink.gif';
        $aliases[] = ':p blum3.gif';
        $aliases[] = ':-P blum3.gif';
        $aliases[] = '8-) dirol.gif';
        $aliases[] = ':-D biggrin.gif';
        $aliases[] = ':-[ blush2.gif';
        $aliases[] = 'o_o shok.gif';
        $aliases[] = ':-* kiss2.gif';
        $aliases[] = ';-( cray2.gif';
        $aliases[] = ':-X secret.gif';
        $aliases[] = ':x secret.gif';
        $aliases[] = ':-@ aggressive.gif';
        $aliases[] = ':-| fool.gif';
        $aliases[] = ':-/ beee.gif';
        $aliases[] = '8P mosking.gif';
        $aliases[] = ':-! bad.gif';
        $aliases[] = '(F) give_rose.gif';

        foreach ($emoticons AS $emotion) {
            $s = explode(' ', $emotion);
            $data['word'] = $s[0];
            $data['img'] = $s[1];
            $this->db->insert('emoticons', $data);
        }
        foreach ($aliases AS $emotion) {
            $s = explode(' ', $emotion);
            $data['word'] = $s[0];
            $data['img'] = $s[1];
            $this->db->insert('emoticons', $data);
        }
    }
}
