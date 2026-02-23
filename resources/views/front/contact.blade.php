@extends('front.layouts.master')
@section('title','İletişim')

@section('content')

<!-- Toast -->
<div id="toast" style="display:none; position:fixed; top:20px; right:20px; z-index:9999; max-width:300px;" class="alert alert-success">
    Mesajınız bize iletildi. Teşekkürler.
</div>

<div class="row gx-4 gx-lg-5 justify-content-center">
    <div class="col-md-10 col-lg-8 col-xl-7">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <p>Benimle iletişime geçebilirsiniz.</p>
        <div class="my-5">
            <form id="contactForm" method="post" action="{{ route('contact.post') }}">
                @csrf
                <div class="form-floating">
                    <input class="form-control" id="name" name="name" type="text" placeholder="Ad Soyadınız" />
                    <label for="name">Ad Soyad</label>
                </div>
                <div class="form-floating">
                    <input class="form-control" id="email" name="email" type="email" placeholder="Email adresiniz." />
                    <label for="email">Email Adresi</label>
                </div>
                <div class="mb-3">
                    <label for="topic">Konu</label>
                    <select class="form-control" name="topic" id="topic">
                        <option>Bilgi</option>
                        <option>Destek</option>
                        <option>Genel</option>
                    </select>
                </div>
                <div class="form-floating">
                    <textarea class="form-control" id="message" name="message" placeholder="Mesajınız." style="height: 12rem"></textarea>
                    <label for="message">Mesajınız</label>
                </div>
                <br />
                <div id="errorMessage" class="d-none alert alert-danger"></div>
                <button class="btn btn-primary text-uppercase" id="submitButton" type="submit">Gönder</button>
            </form>
        </div>
    </div>
</div>

<script>
document.getElementById('contactForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const form = this;

    fetch(form.action, {
        method: 'POST',
        body: new FormData(form),
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json'
        }
    })
    .then(res => res.json())
    .then(data => {
        if(data.success) {
            form.reset();
            const toast = document.getElementById('toast');
            toast.style.display = 'block';
            setTimeout(() => {
                toast.style.display = 'none';
            }, 3000);
        } else if(data.errors) {
            const errorDiv = document.getElementById('errorMessage');
            errorDiv.classList.remove('d-none');
            errorDiv.innerHTML = Object.values(data.errors).flat().join('<br>');
        }
    })
    .catch(err => console.log(err));
});
</script>

@endsection