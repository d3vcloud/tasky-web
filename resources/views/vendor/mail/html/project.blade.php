<table class="action" bgcolor="#f7fbff" align="center" width="100%" cellpadding="0" cellspacing="0">
    <tr>
        <td align="center">
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td align="center">
                        <table border="0" cellpadding="0" cellspacing="0">
                            <tr>
                                <td style="padding-top: 35px; padding-bottom:25px">
                                    <span class="project">{{ $title }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center;padding-top: 5px; padding-bottom:35px">
                                    <a href="{{ $url }}" class="button button-{{ $color or 'blue' }}" target="_blank">{{ $slot }}</a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>