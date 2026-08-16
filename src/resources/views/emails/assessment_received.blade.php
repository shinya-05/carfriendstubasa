<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>査定依頼通知</title>
</head>
<body style="margin:0;padding:0;background:#f3f5f4;color:#1f2925;font-family:-apple-system,BlinkMacSystemFont,'Hiragino Sans','Yu Gothic',Meiryo,sans-serif;">
<table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="background:#f3f5f4;">
    <tr>
        <td align="center" style="padding:24px 12px;">
            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="max-width:640px;background:#ffffff;border:1px solid #dfe5e1;border-radius:12px;overflow:hidden;">
                <tr>
                    <td style="padding:22px 24px;background:#0e5a43;color:#ffffff;">
                        <div style="font-size:12px;letter-spacing:.08em;opacity:.85;">CAR FRIENDS TSUBASA</div>
                        <div style="margin-top:6px;font-size:22px;font-weight:bold;">新しい買取査定依頼</div>
                    </td>
                </tr>
                <tr>
                    <td style="padding:24px;">
                        <p style="margin:0 0 20px;">公式サイトから軽自動車の査定依頼を受け付けました。お客様情報と車両情報をご確認ください。</p>

                        <div style="margin:0 0 8px;font-size:14px;font-weight:bold;color:#0e5a43;">お客様情報</div>
                        <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="border-collapse:collapse;border-top:1px solid #dfe5e1;">
                            <tr>
                                <th align="left" width="130" style="padding:12px;background:#f6f8f7;border-bottom:1px solid #dfe5e1;font-size:13px;">受付日時</th>
                                <td style="padding:12px;border-bottom:1px solid #dfe5e1;">{{ optional($assessment->created_at)->format('Y年m月d日 H:i') ?? now()->format('Y年m月d日 H:i') }}</td>
                            </tr>
                            <tr>
                                <th align="left" style="padding:12px;background:#f6f8f7;border-bottom:1px solid #dfe5e1;font-size:13px;">お名前</th>
                                <td style="padding:12px;border-bottom:1px solid #dfe5e1;">{{ $assessment->name }}</td>
                            </tr>
                            <tr>
                                <th align="left" style="padding:12px;background:#f6f8f7;border-bottom:1px solid #dfe5e1;font-size:13px;">電話番号</th>
                                <td style="padding:12px;border-bottom:1px solid #dfe5e1;"><a href="tel:{{ $assessment->phone }}" style="color:#0e5a43;">{{ $assessment->phone }}</a></td>
                            </tr>
                            <tr>
                                <th align="left" style="padding:12px;background:#f6f8f7;border-bottom:1px solid #dfe5e1;font-size:13px;">メール</th>
                                <td style="padding:12px;border-bottom:1px solid #dfe5e1;">
                                    @if(!empty($assessment->email))
                                        <a href="mailto:{{ $assessment->email }}" style="color:#0e5a43;word-break:break-all;">{{ $assessment->email }}</a>
                                    @else
                                        <span style="color:#7b8781;">入力なし</span>
                                    @endif
                                </td>
                            </tr>
                        </table>

                        <div style="margin:24px 0 8px;font-size:14px;font-weight:bold;color:#0e5a43;">車両情報</div>
                        <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="border-collapse:collapse;border-top:1px solid #dfe5e1;">
                            <tr>
                                <th align="left" width="130" style="padding:12px;background:#f6f8f7;border-bottom:1px solid #dfe5e1;font-size:13px;">メーカー</th>
                                <td style="padding:12px;border-bottom:1px solid #dfe5e1;">{{ $assessment->car_maker }}</td>
                            </tr>
                            <tr>
                                <th align="left" style="padding:12px;background:#f6f8f7;border-bottom:1px solid #dfe5e1;font-size:13px;">車種</th>
                                <td style="padding:12px;border-bottom:1px solid #dfe5e1;">{{ $assessment->car_name }}</td>
                            </tr>
                        </table>

                        <div style="margin:24px 0 8px;font-size:14px;font-weight:bold;color:#0e5a43;">備考・ご要望</div>
                        <div style="padding:16px;background:#f6f8f7;border-left:4px solid #0e5a43;border-radius:4px;white-space:pre-wrap;word-break:break-word;">{{ !empty($assessment->message) ? $assessment->message : '入力なし' }}</div>

                        <p style="margin:20px 0 0;font-size:13px;color:#5f6f67;">
                            @if(!empty($assessment->email))
                                このメールに返信すると、お客様のメールアドレス宛に返信できます。
                            @else
                                メールアドレスの入力がないため、電話でご連絡ください。
                            @endif
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="padding:16px 24px;background:#eef3f0;color:#5f6f67;font-size:12px;">このメールは公式サイトから自動送信されています。</td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
