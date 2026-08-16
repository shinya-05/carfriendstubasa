<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>お問い合わせ通知</title>
</head>
<body style="margin:0;padding:0;background:#f3f5f4;color:#1f2925;font-family:-apple-system,BlinkMacSystemFont,'Hiragino Sans','Yu Gothic',Meiryo,sans-serif;">
<table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="background:#f3f5f4;">
    <tr>
        <td align="center" style="padding:24px 12px;">
            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="max-width:640px;background:#ffffff;border:1px solid #dfe5e1;border-radius:12px;overflow:hidden;">
                <tr>
                    <td style="padding:22px 24px;background:#0e5a43;color:#ffffff;">
                        <div style="font-size:12px;letter-spacing:.08em;opacity:.85;">CAR FRIENDS TSUBASA</div>
                        <div style="margin-top:6px;font-size:22px;font-weight:bold;">新しいお問い合わせ</div>
                    </td>
                </tr>
                <tr>
                    <td style="padding:24px;">
                        <p style="margin:0 0 20px;">公式サイトからお問い合わせを受け付けました。以下の内容をご確認ください。</p>

                        <div style="margin:0 0 8px;font-size:14px;font-weight:bold;color:#0e5a43;">受付情報</div>
                        <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="border-collapse:collapse;border-top:1px solid #dfe5e1;">
                            <tr>
                                <th align="left" width="130" style="padding:12px;background:#f6f8f7;border-bottom:1px solid #dfe5e1;font-size:13px;">受付日時</th>
                                <td style="padding:12px;border-bottom:1px solid #dfe5e1;">{{ optional($inquiry->created_at)->format('Y年m月d日 H:i') ?? now()->format('Y年m月d日 H:i') }}</td>
                            </tr>
                            <tr>
                                <th align="left" style="padding:12px;background:#f6f8f7;border-bottom:1px solid #dfe5e1;font-size:13px;">お名前</th>
                                <td style="padding:12px;border-bottom:1px solid #dfe5e1;">{{ $inquiry->name }}</td>
                            </tr>
                            <tr>
                                <th align="left" style="padding:12px;background:#f6f8f7;border-bottom:1px solid #dfe5e1;font-size:13px;">メール</th>
                                <td style="padding:12px;border-bottom:1px solid #dfe5e1;"><a href="mailto:{{ $inquiry->email }}" style="color:#0e5a43;word-break:break-all;">{{ $inquiry->email }}</a></td>
                            </tr>
                        </table>

                        <div style="margin:24px 0 8px;font-size:14px;font-weight:bold;color:#0e5a43;">お問い合わせ内容</div>
                        <div style="padding:16px;background:#f6f8f7;border-left:4px solid #0e5a43;border-radius:4px;white-space:pre-wrap;word-break:break-word;">{{ $inquiry->message }}</div>

                        <p style="margin:20px 0 0;font-size:13px;color:#5f6f67;">このメールに返信すると、お客様のメールアドレス宛に返信できます。</p>
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
