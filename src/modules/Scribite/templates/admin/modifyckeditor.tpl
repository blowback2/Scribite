{adminheader}<div class="z-admin-content-pagetitle">    {img src='logo_ckeditor.gif' modname='Scribite' height='22'}    <h3>{gt text='CKEditor configuration'}</h3></div><form class="z-form" action="{modurl modname="Scribite" type="admin" func="updateckeditor"}" method="post" enctype="application/x-www-form-urlencoded">    <div>        <input type="hidden" name="csrftoken" value="{insert name="csrftoken"}" />        <fieldset>            <legend>{gt text='Settings'}</legend>            <div class="z-formrow">                <label for="ckeditor_language">{gt text="Editor language"}</label>                <select id="ckeditor_language" name="ckeditor_language">                    {html_options options=$ckeditor_langlist selected=$ckeditor_language}                </select>            </div>            <div class="z-formrow">                <label for="ckeditor_barmode">{gt text="Toolbar"}</label>                <select id="ckeditor_barmode" name="ckeditor_barmode">                    {html_options options=$ckeditor_barmodelist selected=$ckeditor_barmode}                </select>            </div>            <div class="z-formrow">                <label for="ckeditor_skin">{gt text="Skin"}</label>                <select id="ckeditor_skin" name="ckeditor_skin">                    {html_options options=$ckeditor_skinlist selected=$ckeditor_skin}                </select>            </div>            <div class="z-formrow">                <label>{gt text="Editor width and height"}</label>                <div>                    <input id="ckeditor_width" type="text" name="ckeditor_width" size="4" maxlength="6" value="{$ckeditor_width|safetext}" />                    <label for="ckeditor_width">{gt text="(px or %)"}</label>                    <input id="ckeditor_height" type="text" name="ckeditor_height" size="4" maxlength="6" value="{$ckeditor_height|safetext}" />                    <label for="ckeditor_height">{gt text="(px or %)"}</label>                </div>            </div>            <div class="z-formrow">                <label for="ckeditor_style_editor">{gt text="Editor stylesheet"}</label>                <input id="ckeditor_style_editor" type="text" name="ckeditor_style_editor" size="40" maxlength="150" value="{$ckeditor_style_editor|safetext}" />                <em class="z-formnote z-sub">{gt text="You can try to enter your theme stylesheet here if you want."}</em>                <em class="z-formnote z-sub">{gt text="In most cases, the editor fits to the theme then."}</em>                <em class="z-formnote z-sub">{gt text="Example: themes/SeaBreeze/style/style.css"}</em>            </div>        </fieldset>        <div class="z-buttons z-formbuttons">            {button src='button_ok.png' set='icons/extrasmall' __alt="Save" __title="Save" __text="Save"}            <a href="{modurl modname='Scribite' type='admin' func='modules'}">{img modname='core' src='button_cancel.png' set='icons/extrasmall' __alt="Cancel" __title="Cancel"} {gt text="Cancel"}</a>        </div>    </div></form>{adminfooter}