﻿{adminheader}<div class="z-admin-content-pagetitle">    {icon type="config" size="small"}    <h3>{gt text='TinyMCE configuration'}</h3></div>    <form class="z-form" action="{modurl modname="Scribite" type="admin" func="updatetinymce"}" method="post" enctype="application/x-www-form-urlencoded">        <div>            <input type="hidden" name="csrftoken" value="{insert name="csrftoken"}" />            <fieldset>                <legend>{gt text='Settings'}</legend>                <div class="z-formrow">                    <label for="tinymce_language">{gt text="Editorlanguage"}</label>                    <select id="tinymce_language" name="tinymce_language">                        {html_options options=$tinymce_langlist selected=$tinymce_language}                    </select>                </div>                <div class="z-formrow">                    <label for="tinymce_theme">{gt text="Theme"}</label>                    <select id="tinymce_theme" name="tinymce_theme">                        {html_options options=$tinymce_themelist selected=$tinymce_theme}                    </select>                </div>                <div class="z-formrow">                    <label for="tinymce_dateformat">{gt text="Date format"}</label>                    <input id="tinymce_dateformat" type="text" name="tinymce_dateformat" size="40" maxlength="50" value="{$tinymce_dateformat|safetext}" />                </div>                <div class="z-formrow">                    <label for="tinymce_timeformat">{gt text="Time format"}</label>                    <input id="tinymce_timeformat" type="text" name="tinymce_timeformat" size="40" maxlength="50" value="{$tinymce_timeformat|safetext}" />                </div>                <div class="z-formrow">                    <label>{gt text="Editor width and height"}</label>                    <div>                        <input id="tinymce_width" type="text" name="tinymce_width" size="4" maxlength="4" value="{$tinymce_width|safetext}" />                        <label for="tinymce_width">{gt text="px/(%)"}</label>                        <input id="tinymce_height" type="text" name="tinymce_height" size="4" maxlength="4" value="{$tinymce_height|safetext}" />                        <label for="tinymce_height">{gt text="px/(%)"}</label>                    </div>                </div>                <div class="z-formrow">                    <label for="tinymce_style">{gt text="Editor-Stylesheet"}</label>                    <input id="tinymce_style" type="text" name="tinymce_style" size="40" maxlength="50" value="{$tinymce_style|safetext}" />                </div>            </fieldset>            <fieldset>                <legend>{gt text='TinyMCE Plugins (<a href="http://wiki.moxiecode.com/index.php/TinyMCE:Plugins">documentation</a>)'}</legend>                <div class="z-formrow">                    {html_checkboxes labels=false name="tinymce_activeplugins" values=$tinymce_allplugins output=$tinymce_allplugins selected=$tinymce_activeplugins|unserialize separator="<br />"}                </div>            </fieldset>            <div class="z-buttons z-formbuttons">                {button src='button_ok.png' set='icons/extrasmall' __alt="Save" __title="Save" __text="Save"}                <a href="{modurl modname='Scribite' type='admin' func='modules'}">{img modname='core' src='button_cancel.png' set='icons/extrasmall' __alt="Cancel" __title="Cancel"} {gt text="Cancel"}</a>            </div>        </div>    </form>{adminfooter}