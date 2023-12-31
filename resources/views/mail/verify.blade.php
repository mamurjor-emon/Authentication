@extends('mail.layouts.app')
@section('heading', $data['heading'])
@section('content')
<tr>
    <td align="left" style="padding-bottom:20px;Margin:0">
        <table style="font-family:'Cabin',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
            <tbody>
                <tr>
                    <td style="overflow-wrap:break-word;word-break:break-word;padding-right:55px;padding-left:55px;padding-bottom: 30px; font-family:'Cabin',sans-serif;" align="left">
                       {!! $data['body'] !!}
                    </td>
                </tr>
            </tbody>
        </table>
    </td>
</tr>
@endsection
