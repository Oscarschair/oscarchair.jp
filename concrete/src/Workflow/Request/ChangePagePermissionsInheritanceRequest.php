<?php
namespace Concrete\Core\Workflow\Request;

use Loader;
use Page;
use Concrete\Core\Workflow\Description as WorkflowDescription;
use PermissionKey;
use Concrete\Core\Workflow\Progress\Progress as WorkflowProgress;
use Concrete\Core\Workflow\Progress\Response as WorkflowProgressResponse;

class ChangePagePermissionsInheritanceRequest extends PageRequest
{
    protected $wrStatusNum = 30;

    public function __construct()
    {
        $pk = PermissionKey::getByHandle('edit_page_permissions');
        parent::__construct($pk);
    }

    public function setPagePermissionsInheritance($inheritance)
    {
        $this->inheritance = $inheritance;
    }

    public function getPagePermissionsInheritance()
    {
        return $this->inheritance;
    }

    public function getWorkflowRequestDescriptionObject()
    {
        $d = new WorkflowDescription();
        $c = Page::getByID($this->cID, 'ACTIVE');
        $link = Loader::helper('navigation')->getLinkToCollection($c, true);
        $d->setEmailDescription(t("\"%s\" has pending permission inheritance. View the page here: %s.", $c->getCollectionName(), $link));
        $d->setInContextDescription(t("Page Submitted to Change Permission Inheritance to %s.", ucfirst(strtolower($this->inheritance))));
        $d->setDescription(t("<a href=\"%s\">%s</a> submitted to change permission inheritance to %s.", $link, $c->getCollectionName(), ucfirst(strtolower($this->inheritance))));
        $d->setShortStatus(t("Permission Inheritance Changes"));

        return $d;
    }

    public function getWorkflowRequestStyleClass()
    {
        return 'info';
    }

    public function getWorkflowRequestApproveButtonClass()
    {
        return '';
    }

    public function getWorkflowRequestApproveButtonInnerButtonRightHTML()
    {
        return '<i class="fas fa-thumbs-up"></i>';
    }

    public function getWorkflowRequestApproveButtonText()
    {
        return t('Change Inheritance');
    }

    public function approve(WorkflowProgress $wp)
    {
        $c = Page::getByID($this->getRequestedPageID());
        switch ($this->inheritance) {
            case 'PARENT':
                $c->inheritPermissionsFromParent();
                break;
            case 'TEMPLATE':
                $c->inheritPermissionsFromDefaults();
                break;
            default:
                $c->setPermissionsToManualOverride();
                break;
        }
        $wpr = new WorkflowProgressResponse();
        $wpr->setWorkflowProgressResponseURL(\URL::to($c));

        return $wpr;
    }
}
