@extends('layout.app')

@section('title', 'つくば市の格安軽自動車｜カーフレンズツバサ')
@section('meta_description', '茨城県つくば市の軽自動車専門店カーフレンズツバサ。低価格でも状態を丁寧にご説明し、全国販売・オンラインでの車両確認にも対応。中古車販売・買取・車検・整備までご相談ください。')

@push('head')
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "AutoDealer",
  "name": "株式会社カーフレンズツバサ",
  "url": "{{ url('/') }}",
  "telephone": "+81-29-879-9474",
  "image": "{{ asset('images/logo.jpg') }}",
  "address": {"@type":"PostalAddress","postalCode":"300-1243","addressRegion":"茨城県","addressLocality":"つくば市","streetAddress":"大井1440-48","addressCountry":"JP"},
  "openingHoursSpecification": [{"@type":"OpeningHoursSpecification","dayOfWeek":["Monday","Thursday","Friday","Saturday","Sunday"],"opens":"10:00","closes":"18:00"}],
  "areaServed": ["つくば市","土浦市","牛久市","茨城県","日本全国"]
}
</script>
@endpush

@push('styles')
<style>
:root{--cft-navy:#09294f;--cft-blue:#134a7c;--cft-gold:#d2aa55;--cft-red:#c9272c;--cft-ink:#172333;--cft-muted:#627083;--cft-paper:#f4f7fa}
body{background:#fff;color:var(--cft-ink)}
.home-section{padding:clamp(64px,8vw,104px) 0}.home-section--soft{background:var(--cft-paper)}
.eyebrow{color:var(--cft-blue);font-size:.78rem;font-weight:900;letter-spacing:.18em}
.section-heading{margin:10px 0 14px;font-size:clamp(1.8rem,3.4vw,2.8rem);font-weight:900;letter-spacing:-.025em;line-height:1.35}
.section-lead{max-width:760px;color:var(--cft-muted);font-size:1.03rem;line-height:2}
.home-hero{position:relative;min-height:min(860px,92vh);display:flex;align-items:center;color:#fff;overflow:hidden;background:#071b30 url('/images/hero2.jpg') center 44%/cover no-repeat}
.home-hero:before{content:"";position:absolute;inset:0;background:linear-gradient(90deg,rgba(4,19,36,.92),rgba(5,27,51,.76) 48%,rgba(5,20,38,.28))}
.home-hero__content{position:relative;z-index:1;max-width:820px;padding:126px 0 72px}
.home-hero__label{display:inline-flex;align-items:center;gap:8px;padding:8px 13px;border:1px solid rgba(255,255,255,.32);border-radius:999px;background:rgba(0,0,0,.18);backdrop-filter:blur(7px);font-size:.82rem;font-weight:800}
.home-hero h1{margin:22px 0 18px;font-size:clamp(2.35rem,5.6vw,5rem);font-weight:900;letter-spacing:-.045em;line-height:1.14;text-shadow:0 8px 30px rgba(0,0,0,.28)}
.home-hero__accent{color:#f0cb78}.home-hero__lead{max-width:690px;margin:0 0 28px;color:rgba(255,255,255,.9);font-size:clamp(1rem,1.8vw,1.2rem);line-height:1.9}
.hero-actions{display:flex;flex-wrap:wrap;gap:12px}.hero-btn{display:inline-flex;min-height:56px;align-items:center;justify-content:center;gap:9px;padding:14px 22px;border:1px solid transparent;border-radius:8px;font-weight:900;text-decoration:none;transition:.2s}
.hero-btn:hover{transform:translateY(-2px)}.hero-btn--primary{background:var(--cft-red);color:#fff;box-shadow:0 12px 30px rgba(201,39,44,.28)}.hero-btn--primary:hover{color:#fff;background:#ae1f24}
.hero-btn--light{border-color:rgba(255,255,255,.52);background:rgba(255,255,255,.1);color:#fff;backdrop-filter:blur(8px)}.hero-btn--light:hover{color:#fff;background:rgba(255,255,255,.2)}
.hero-facts{display:flex;flex-wrap:wrap;gap:8px 20px;margin-top:30px;color:rgba(255,255,255,.84);font-size:.9rem}.hero-facts span{display:inline-flex;align-items:center;gap:7px}.hero-facts i{color:#f0cb78}
.inventory-panel{position:relative;z-index:3;margin-top:-50px;border-radius:18px;background:#fff;box-shadow:0 24px 70px rgba(9,41,79,.18);overflow:hidden}
.inventory-panel__intro{padding:28px 30px;background:var(--cft-navy);color:#fff}.inventory-panel__intro h2{margin:4px 0 5px;font-size:clamp(1.35rem,2.5vw,1.8rem);font-weight:900}.inventory-panel__intro p{margin:0;color:rgba(255,255,255,.76);font-size:.92rem}
.inventory-links{display:grid;grid-template-columns:1fr 1fr}.inventory-link{display:flex;align-items:center;justify-content:space-between;gap:20px;min-height:118px;padding:24px 30px;color:var(--cft-ink);text-decoration:none;border-right:1px solid #e7ebef;transition:.2s}.inventory-link:last-child{border:0}.inventory-link:hover{background:#f8fafc;color:var(--cft-navy)}
.inventory-link__name{display:block;margin-bottom:5px;font-size:1.15rem;font-weight:900}.inventory-link__note{color:var(--cft-muted);font-size:.85rem}.inventory-link i{width:42px;height:42px;display:grid;place-items:center;flex:0 0 auto;border-radius:50%;background:var(--cft-paper);color:var(--cft-navy)}
.promise-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:18px;margin-top:38px}.promise-card{padding:28px 24px;border:1px solid #e3e9ef;border-radius:14px;background:#fff}.promise-card__number{color:var(--cft-gold);font-size:.78rem;font-weight:900;letter-spacing:.12em}.promise-card h3{margin:12px 0 10px;font-size:1.08rem;font-weight:900;line-height:1.55}.promise-card p{margin:0;color:var(--cft-muted);font-size:.9rem;line-height:1.85}
.promise-note{margin-top:18px;padding:13px 16px;border-radius:8px;background:#fff8e9;color:#715a27;font-size:.84rem;line-height:1.7}
.statement{position:relative;overflow:hidden;background:var(--cft-navy);color:#fff}.statement:after{content:"TSUBASA";position:absolute;right:-20px;bottom:-54px;color:rgba(255,255,255,.035);font-size:clamp(6rem,18vw,15rem);font-weight:900}
.statement__inner{position:relative;z-index:1;display:grid;grid-template-columns:.8fr 1.2fr;gap:70px;align-items:center}.statement__figure{border-radius:16px;overflow:hidden;box-shadow:0 20px 50px rgba(0,0,0,.24)}.statement__figure img{display:block;width:100%;height:420px;object-fit:cover}.statement .eyebrow{color:#f0cb78}.statement p{color:rgba(255,255,255,.79);line-height:2}.statement blockquote{margin:24px 0;padding-left:20px;border-left:3px solid var(--cft-gold);font-size:clamp(1.25rem,2.4vw,1.7rem);font-weight:900;line-height:1.65}
.step-grid{display:grid;grid-template-columns:repeat(4,1fr);margin-top:40px;counter-reset:step}.step{padding:0 26px;border-left:1px solid #dfe5eb;counter-increment:step}.step:first-child{padding-left:0;border:0}.step:before{content:"0" counter(step);display:block;margin-bottom:12px;color:var(--cft-gold);font-size:1.35rem;font-weight:900}.step h3{font-size:1.05rem;font-weight:900}.step p{margin:0;color:var(--cft-muted);font-size:.88rem;line-height:1.8}
.nationwide-box{display:grid;grid-template-columns:1.05fr .95fr;overflow:hidden;border-radius:18px;background:#fff;box-shadow:0 18px 50px rgba(9,41,79,.11)}.nationwide-box__copy{padding:clamp(34px,5vw,62px)}.nationwide-box__media{min-height:360px;background:url('/images/hero1.jpg') center/cover no-repeat}
.check-list{display:grid;gap:11px;margin:24px 0 28px;padding:0;list-style:none}.check-list li{display:flex;gap:10px;color:var(--cft-muted)}.check-list i{margin-top:5px;color:var(--cft-gold)}
.store-grid{display:grid;grid-template-columns:1.05fr .95fr;gap:38px;align-items:stretch;margin-top:36px}.store-map{min-height:430px;overflow:hidden;border-radius:16px;box-shadow:0 15px 45px rgba(9,41,79,.12)}.store-map iframe{width:100%;height:100%;border:0}.store-card{padding:34px;border-radius:16px;background:var(--cft-navy);color:#fff}.store-card h3{margin-bottom:25px;font-weight:900}
.store-info{display:grid;margin:0}.store-info div{display:grid;grid-template-columns:86px 1fr;gap:16px;padding:15px 0;border-top:1px solid rgba(255,255,255,.13)}.store-info dt{color:rgba(255,255,255,.58);font-size:.82rem}.store-info dd{margin:0;font-weight:700;line-height:1.7}.store-info a{color:#fff}.store-actions{display:flex;flex-wrap:wrap;gap:10px;margin-top:24px}.store-actions a{display:inline-flex;align-items:center;gap:7px;padding:12px 16px;border-radius:7px;background:#fff;color:var(--cft-navy);font-weight:900;text-decoration:none}
.faq-wrap{max-width:900px;margin:36px auto 0}.accordion-item{border-color:#dfe5eb}.accordion-button{padding:22px;color:var(--cft-ink);font-weight:900}.accordion-button:not(.collapsed){color:var(--cft-navy);background:#edf4fa;box-shadow:none}.accordion-body{color:var(--cft-muted);line-height:1.9}
.final-cta{padding:clamp(56px,8vw,90px) 0;background:linear-gradient(135deg,#0a294e,#123f6c);color:#fff;text-align:center}.final-cta h2{font-size:clamp(1.8rem,3.4vw,2.7rem);font-weight:900}.final-cta p{color:rgba(255,255,255,.77);line-height:1.9}.final-cta .hero-actions{justify-content:center}
@media(max-width:991px){.promise-grid{grid-template-columns:1fr 1fr}.statement__inner,.nationwide-box,.store-grid{grid-template-columns:1fr}.statement__inner{gap:36px}.nationwide-box__media{min-height:300px;order:-1}.step-grid{grid-template-columns:1fr 1fr;gap:28px 0}.step:nth-child(3){padding-left:0;border:0}}
@media(max-width:767px){.home-hero{min-height:760px;background-position:58% center}.home-hero:before{background:rgba(4,19,36,.76)}.home-hero__content{padding-top:118px}.hero-actions{display:grid}.hero-btn{width:100%}.inventory-panel{margin-top:-34px}.inventory-panel__intro{padding:22px}.inventory-links,.promise-grid,.step-grid{grid-template-columns:1fr}.inventory-link{min-height:100px;padding:20px 22px;border-right:0;border-bottom:1px solid #e7ebef}.step,.step:nth-child(3){padding:20px 0;border-left:0;border-top:1px solid #dfe5eb}.step:first-child{border-top:0}.statement__figure img{height:320px}.store-map{min-height:330px}.store-card{padding:26px 22px}}
</style>
@endpush

@section('content')
<section class="home-hero">
 <div class="container"><div class="home-hero__content">
  <div class="home-hero__label"><i class="fa-solid fa-location-dot"></i> 茨城県つくば市・軽自動車専門店</div>
  <h1>予算を抑えても、<br><span class="home-hero__accent">安心</span>はあきらめない。</h1>
  <p class="home-hero__lead">低価格の軽自動車だからこそ、状態を丁寧にお伝えします。価格だけで決めず、納得して選べる一台を一緒に探します。</p>
  <div class="hero-actions">
   <a class="hero-btn hero-btn--primary" href="https://www.goo-net.com/usedcar_shop/0401923/stock.html" target="_blank" rel="noopener noreferrer"><i class="fa-solid fa-car"></i> 最新の在庫を見る</a>
   <a class="hero-btn hero-btn--light" href="{{ route('contact.form') }}"><i class="fa-regular fa-calendar-check"></i> 来店・車両相談をする</a>
   <a class="hero-btn hero-btn--light" href="tel:0298799474"><i class="fa-solid fa-phone"></i> 029-879-9474</a>
  </div>
  <div class="hero-facts"><span><i class="fa-solid fa-circle-check"></i> 軽自動車に特化</span><span><i class="fa-solid fa-circle-check"></i> 全国販売に対応</span><span><i class="fa-solid fa-clock"></i> 10:00〜18:00／火・水曜定休</span></div>
 </div></div>
</section>

<div class="container" id="inventory"><div class="inventory-panel">
 <div class="inventory-panel__intro"><div class="eyebrow" style="color:#f0cb78">STOCK</div><h2>販売中の軽自動車をチェック</h2><p>在庫・支払総額は各ポータルで随時更新しています。</p></div>
 <div class="inventory-links">
  <a class="inventory-link" href="https://www.goo-net.com/usedcar_shop/0401923/stock.html" target="_blank" rel="noopener noreferrer"><span><span class="inventory-link__name">グーネットで在庫を見る</span><span class="inventory-link__note">写真・車両情報・支払総額を確認</span></span><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
  <a class="inventory-link" href="https://www.carsensor.net/shop/ibaraki/325043001/stocklist/" target="_blank" rel="noopener noreferrer"><span><span class="inventory-link__name">カーセンサーで在庫を見る</span><span class="inventory-link__note">気になる車両を比較・問い合わせ</span></span><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
 </div>
</div></div>

<section class="home-section" id="quality"><div class="container">
 <div class="eyebrow">OUR PROMISE</div><h2 class="section-heading">「価格以上の安心」を、<br>判断できる情報に。</h2>
 <p class="section-lead">格安中古車で一番気になるのは「安い理由」と購入後のこと。車両の状態をできるだけ分かりやすくお伝えし、納得して選べる商談を大切にしています。</p>
 <div class="promise-grid">
  <article class="promise-card"><div class="promise-card__number">PROMISE 01</div><h3>状態を丁寧に説明</h3><p>年式や走行距離だけでは分からない状態、気になる点も含めてご説明します。</p></article>
  <article class="promise-card"><div class="promise-card__number">PROMISE 02</div><h3>支払総額で比較</h3><p>各ポータルの支払総額を見ながら、予算に合う一台を比較できます。</p></article>
  <article class="promise-card"><div class="promise-card__number">PROMISE 03</div><h3>写真・ビデオで確認</h3><p>遠方の方には、電話・ビデオ通話・追加写真で車両をご案内します。</p></article>
  <article class="promise-card"><div class="promise-card__number">PROMISE 04</div><h3>購入後も相談できる</h3><p>販売だけでなく、車検・点検・整備・次のお乗り換えまでご相談いただけます。</p></article>
 </div>
 <div class="promise-note"><i class="fa-solid fa-circle-info me-2"></i>納車前整備や保証の内容は車両・販売条件により異なります。対象車の具体的な内容は商談時にスタッフへお尋ねください。</div>
</div></section>

<section class="home-section statement"><div class="container statement__inner">
 <figure class="statement__figure mb-0"><img src="{{ asset('images/staff1.jpg') }}" alt="カーフレンズツバサ代表 黒田翼" loading="lazy"></figure>
 <div><div class="eyebrow">MESSAGE</div><h2 class="section-heading">古いから、多走行だから。<br>それだけで決めつけません。</h2><blockquote>10年落ち、10万km以上の車でも、できる限りきれいに仕上げて販売します。</blockquote><p>低価格車には、一台ごとに違う個性があります。写真や数字だけでは伝わらない部分も含め、気になることを遠慮なく聞いていただける店でありたいと考えています。</p><div class="fw-bold">代表取締役　黒田 翼</div></div>
</div></section>

<section class="home-section" id="flow"><div class="container">
 <div class="eyebrow">HOW TO BUY</div><h2 class="section-heading">気になる一台から、ご納車まで。</h2><p class="section-lead">初めて中古車を買う方も、遠方の方も、順を追ってご案内します。</p>
 <div class="step-grid">
  <article class="step"><h3>在庫を選ぶ</h3><p>グーネット・カーセンサーで気になる車両をご確認ください。</p></article>
  <article class="step"><h3>相談・来店予約</h3><p>車両名を添えて、電話またはお問い合わせフォームからご連絡ください。</p></article>
  <article class="step"><h3>状態・費用を確認</h3><p>現車または写真・ビデオ通話で状態を確認し、費用や手続きをご案内します。</p></article>
  <article class="step"><h3>ご契約・ご納車</h3><p>必要書類やお支払いを確認し、準備完了後にお引き渡しします。</p></article>
 </div>
</div></section>

<section class="home-section home-section--soft" id="nationwide"><div class="container"><div class="nationwide-box">
 <div class="nationwide-box__copy"><div class="eyebrow">NATIONWIDE</div><h2 class="section-heading">北海道から沖縄まで、<br>全国販売に対応。</h2><p class="section-lead">現車を見に来られない方にも、ご納得いただけるまで車両をご案内します。</p>
  <ul class="check-list"><li><i class="fa-solid fa-check"></i><span>電話・ビデオ通話によるオンライン車両確認</span></li><li><i class="fa-solid fa-check"></i><span>気になる箇所の追加写真にも対応</span></li><li><i class="fa-solid fa-check"></i><span>お住まいの地域に応じた手続き・納車方法をご案内</span></li></ul>
  <a class="hero-btn hero-btn--primary" href="{{ route('contact.form') }}"><i class="fa-regular fa-comments"></i> 遠方購入について相談する</a>
 </div><div class="nationwide-box__media" role="img" aria-label="カーフレンズツバサの展示車両"></div>
</div></div></section>

<section class="home-section" id="store"><div class="container">
 <div class="eyebrow">STORE</div><h2 class="section-heading">つくば市大井の展示場で、<br>実際にお確かめください。</h2><p class="section-lead">ゆっくり車両をご覧いただくため、ご来店前の予約をおすすめしています。</p>
 <div class="store-grid">
  <div class="store-map"><iframe title="カーフレンズツバサ所在地" src="https://www.google.com/maps?q=茨城県つくば市大井1440-48&output=embed" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
  <div class="store-card"><h3>株式会社カーフレンズツバサ</h3><dl class="store-info">
   <div><dt>所在地</dt><dd>〒300-1243<br>茨城県つくば市大井1440-48</dd></div><div><dt>電話</dt><dd><a href="tel:0298799474">029-879-9474</a></dd></div><div><dt>営業時間</dt><dd>10:00〜18:00</dd></div><div><dt>定休日</dt><dd>火曜日・水曜日</dd></div><div><dt>事業内容</dt><dd>中古自動車販売／自動車買取／車検・点検・整備</dd></div>
  </dl><div class="store-actions"><a href="tel:0298799474"><i class="fa-solid fa-phone"></i> 電話する</a><a href="{{ route('contact.form') }}"><i class="fa-regular fa-calendar-check"></i> 来店予約</a></div></div>
 </div>
</div></section>

<section class="home-section home-section--soft" id="faq"><div class="container">
 <div class="text-center"><div class="eyebrow">FAQ</div><h2 class="section-heading">よくあるご質問</h2></div>
 <div class="accordion faq-wrap" id="homeFaq">
  <div class="accordion-item"><h3 class="accordion-header"><button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">遠方からでも購入できますか？</button></h3><div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#homeFaq"><div class="accordion-body">はい、日本全国のお客様とのお取引に対応しています。電話・ビデオ通話・写真で車両をご確認いただき、地域に応じた手続きや納車方法をご案内します。</div></div></div>
  <div class="accordion-item"><h3 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">10年落ち・10万km以上の車でも大丈夫ですか？</button></h3><div id="faq2" class="accordion-collapse collapse" data-bs-parent="#homeFaq"><div class="accordion-body">年式や走行距離だけで一概には判断できません。対象車の状態や整備内容、気になる点をご確認いただき、用途とご予算に合うか一緒に検討します。</div></div></div>
  <div class="accordion-item"><h3 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">予約なしでも車を見られますか？</button></h3><div id="faq3" class="accordion-collapse collapse" data-bs-parent="#homeFaq"><div class="accordion-body">車両の移動や商談状況があるため、事前のご予約をおすすめしています。電話またはお問い合わせフォームから、気になる車両名と希望日時をお知らせください。</div></div></div>
  <div class="accordion-item"><h3 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">車検や整備も相談できますか？</button></h3><div id="faq4" class="accordion-collapse collapse" data-bs-parent="#homeFaq"><div class="accordion-body">はい。中古車販売・買取のほか、車検・点検・整備も承っています。対応内容は車種や状態により異なるため、まずはお問い合わせください。</div></div></div>
 </div>
</div></section>

<section class="final-cta"><div class="container"><h2>まずは、気になる一台を見つけてください。</h2><p class="mt-3 mb-4">在庫確認、車両状態、来店予約、遠方購入。分からないことからご相談いただけます。</p><div class="hero-actions"><a class="hero-btn hero-btn--primary" href="https://www.goo-net.com/usedcar_shop/0401923/stock.html" target="_blank" rel="noopener noreferrer"><i class="fa-solid fa-car"></i> 最新の在庫を見る</a><a class="hero-btn hero-btn--light" href="{{ route('contact.form') }}"><i class="fa-regular fa-envelope"></i> お問い合わせ</a></div></div></section>
@endsection
