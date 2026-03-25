査定依頼がありました。

【お名前】
{{ $assessment->name }}

【電話番号】
{{ $assessment->phone }}

【メーカー】
{{ $assessment->car_maker }}

【車種】
{{ $assessment->car_name }}

@if(!empty($assessment->email))
【メールアドレス】
{{ $assessment->email }}
@endif

@if(!empty($assessment->message))
【備考】
{{ $assessment->message }}
@endif