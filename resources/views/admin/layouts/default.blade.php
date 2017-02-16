@include("admin.layouts.header")
@include("admin.layouts.menu")

<table cellspacing="0" cellpadding="0" border="0" class="content-table">
    <tr valign="top">
        <td width="1px" class="side-menu"><div id="right_column"><?php if(isset($vars['left_menu']))echo $vars['left_menu'];?></div></td>
        <td class="content">
            <div class="mainbox-breadcrumbs">
                <!--if(isset($vars['breadcrumb']))echo $vars['breadcrumb']-->
            </div>
            <div class="clear" id="main_column">@yield('content')</div>
        </td>
    </tr>
</table>

@include('admin.layouts.footer')