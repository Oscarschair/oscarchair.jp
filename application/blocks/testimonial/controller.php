<?php
namespace Application\Block\Testimonial;
use Concrete\Block\Testimonial\Controller as TestimonialBlockController;


defined('C5_EXECUTE') or die("Access Denied.");
use Concrete\Core\Block\BlockController;
use Core;

class Controller extends TestimonialBlockController
{
    public $helpers = array('form');

    protected $btInterfaceWidth = 450;
    protected $btCacheBlockOutput = true;
    protected $btCacheBlockOutputOnPost = true;
    protected $btCacheBlockOutputForRegisteredUsers = true;
    protected $btInterfaceHeight = 560;
    protected $btExportFileColumns = array('fID');
    protected $btTable = 'btTestimonial';

    public function getBlockTypeDescription()
    {
        return t("Displays a quote or paragraph next to biographical information and a person's picture.");
    }

    public function getBlockTypeName()
    {
        return t("Testimonial");
    }

    public function getSearchableContent()
    {
        return $this->name . "\n" . $this->position . "\n" . $this->company . "\n" . $this->paragraph;
    }

    public function view()
    {
        $image = false;
        if ($this->fID) {
            $f = \File::getByID($this->fID);
            if (is_object($f)) {
                $image = Core::make('html/image', ['f' => $f])->getTag();
                $image->alt($this->name);
                $this->set('image', $image);
            }
        }



        // $image = false;
        // if ($this->fID) {
        //     $f = File::getByID($this->fID);
        //     if (is_object($f)) {
        //         $image = $this->app->make('html/image', ['f' => $f])->getTag();
        //         $image->alt($this->name);
        //     }
        // }
        // $this->set('image', $image);

    }
}
