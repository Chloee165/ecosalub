<x-admin.layout>
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="admin-connection-form">
        <form action="{{ route('admin.login.submit') }}" method="POST">
            @csrf
            <h2>Connexion</h2>

            <table>
                <tr>
                    <td><label for="courriel">Courriel</label></td>
                </tr>
                <tr>
                    <td><input type="email" id="courriel" name="courriel" required></td>
                </tr>

                <tr>
                    <td><label for="mot_de_passe">Mot de passe</label></td>
                </tr>
                <tr>
                    <td><input type="password" id="mot_de_passe" name="mot_de_passe" required></td>
                </tr>

                <tr>
                    <td><button type="submit">Envoyer</button></td>
                </tr>
            </table>
        </form>
    </div>
</x-admin.layout>
