<?php
/**
 * @author Harry Tang <harry@modernkernel.com>
 * @link https://modernkernel.com
 * @copyright Copyright (c) 2016 Modern Kernel
 */

namespace justyork\fineuploader;


use yii\base\Widget;
use yii\helpers\Json;

/**
 * Class Fineuploader
 * @package modernkernel\fineuploader
 */
class Fineuploader extends \modernkernel\fineuploader\Fineuploader
{

    public $template='';

    /* labels */
    public $dropLabel = 'Drop your files here';
    public $dropProcessingLabel = 'Processing dropped file(s)...';
    public $buttonLabel = 'Upload files';
    public $cancelLabel = 'Cancel';
    public $retryLabel = 'Retry';
    public $deleteLabel = 'Delete';
    public $pauseLabel = 'Pause';
    public $closeLabel = 'Close';
    public $continueLabel = 'Continue';
    public $yesLabel = 'Yes';
    public $noLabel = 'No';
    public $okLabel = 'OK';
    public $editFilenameLabel = 'Edit filename';

    /**
     * fineuploader options
     * see http://docs.fineuploader.com/branch/master/
     * @var []
     */
    public $options = []; //
    public $default_options = [
        'template' => 'qq-template'
    ];

    /**
     * fineuploader events
     * see http://docs.fineuploader.com/branch/master/
     * @var []
     */
    public $events = [];
    public $default_events = [
        'autoRetry' => '',
        'cancel' => '',
        'complete' => '',
        'allComplete' => '',
        'delete' => '',
        'deleteComplete' => '',
        'error' => '',
        'manualRetry' => '',
        'pasteReceived' => '',
        'progress' => '',
        'resume' => '',
        'sessionRequestComplete' => '',
        'statusChange' => '',
        'submit' => '',
        'submitDelete' => '',
        'submitted' => '',
        'totalProgress' => '',
        'upload' => '',
        'uploadChunk' => '',
        'uploadChunkSuccess' => '',
        'validate' => '',
        'validateBatch' => '',
        'rotateLeft' => '',
        'rotateRight' => '',
    ];


    /**
     * @inheritdoc
     */
    public function run()
    {
        $this->registerPlugin();
        $this->registerJS();
        $id = $this->getId();

        echo <<<EOB
<div id="{$id}"></div>          
<script type="text/template" id="{$this->options['template']}">
    <div class="qq-uploader-selector qq-uploader" qq-drop-area-text="{$this->dropLabel}">
        <div class="qq-total-progress-bar-container-selector qq-total-progress-bar-container">
            <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="qq-total-progress-bar-selector qq-progress-bar qq-total-progress-bar"></div>
        </div>
        <div class="qq-upload-drop-area-selector qq-upload-drop-area" qq-hide-dropzone>
            <span class="qq-upload-drop-area-text-selector"></span>
        </div>
        <div class="qq-upload-button-selector qq-upload-button" style="width: auto">
            <div>{$this->buttonLabel}</div>
        </div>
            <span class="qq-drop-processing-selector qq-drop-processing">
                <span>{$this->dropProcessingLabel}</span>
                <span class="qq-drop-processing-spinner-selector qq-drop-processing-spinner"></span>
            </span>
        <ul class="qq-upload-list-selector qq-upload-list" aria-live="polite" aria-relevant="additions removals">
            <li>
                <div class="qq-progress-bar-container-selector">
                    <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="qq-progress-bar-selector qq-progress-bar"></div>
                </div>
                <div class="qq-thumbnail-wrapper">
					<img class="qq-thumbnail-selector" qq-max-size="200" qq-server-scale>
				</div>
                <span class="qq-upload-spinner-selector qq-upload-spinner"></span>
                <span class="qq-upload-file-selector qq-upload-file"></span>
                <span class="qq-edit-filename-icon-selector qq-edit-filename-icon" aria-label="{$this->editFilenameLabel}"></span>
                <input class="qq-edit-filename-selector qq-edit-filename" tabindex="0" type="text">
                <span class="qq-upload-size-selector qq-upload-size"></span>
                <button type="button" class="qq-link qq-rotate-left ion-ios-undo-outline" title="Rotate left 90"></button>
                <button type="button" class="qq-link qq-rotate-right ion-ios-redo-outline" title="Rotate right 90"></button>
                <button type="button" class="qq-link qq-btn qq-upload-cancel-selector ion-ios-close-empty" title="{$this->cancelLabel}"></button>
                <button type="button" class="qq-link qq-btn qq-upload-retry-selector ion-ios-reload" title="{$this->retryLabel}"></button>
                <button type="button" class="qq-link qq-btn qq-upload-delete-selector ion-ios-trash-outline" title="{$this->deleteLabel}"></button>
                <span role="status" class="qq-upload-status-text-selector qq-upload-status-text"></span>
            </li>
        </ul>

        <dialog class="qq-alert-dialog-selector">
            <div class="qq-dialog-message-selector"></div>
            <div class="qq-dialog-buttons">
                <button type="button" class="qq-cancel-button-selector">{$this->closeLabel}</button>
            </div>
        </dialog>

        <dialog class="qq-confirm-dialog-selector">
            <div class="qq-dialog-message-selector"></div>
            <div class="qq-dialog-buttons">
                <button type="button" class="qq-cancel-button-selector">{$this->noLabel}</button>
                <button type="button" class="qq-ok-button-selector">{$this->yesLabel}</button>
            </div>
        </dialog>

        <dialog class="qq-prompt-dialog-selector">
            <div class="qq-dialog-message-selector"></div>
            <input type="text">
            <div class="qq-dialog-buttons">
                <button type="button" class="qq-cancel-button-selector">{$this->cancelLabel}</button>
                <button type="button" class="qq-ok-button-selector">{$this->okLabel}</button>
            </div>
        </dialog>
        <div class="clearfix"></div>
    </div>
</script>
EOB;

    }
} 