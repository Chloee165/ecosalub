@props(['headerImage' => 'img/fadeBlanc.jpg'])
<x-layout>
    <x-nav headerImage="img/camions-contact.jpg" headerPhrase="Contactez-nous dès aujourd'hui!" />
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div id="contact-page">
        <div class="open-hours">
            <h2>Heures d'ouverture</h2>
            <ul>
                <li>Lundi: 8h – 16h30</li>
                <li>Mardi: 8h – 16h30</li>
                <li>Mercredi: 8h – 16h30</li>
                <li>Jeudi: 8h – 16h30</li>
                <li>Vendredi: 8h – 16h30</li>
                <li>Samedi: Fermé</li>
                <li>Dimanche: Fermé</li>
            </ul>

            <h2>Ecosalub Laval</h2>
            <p>3060 rue Peugeot</p>
            <p>Laval, QC H7L5C5</p>
            <p>CA</p>
            iframe class="map" <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5584.288794383871!2d-73.7470242!3d45.5876419!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4cc9215c5506270b%3A0x7d7c9922f3e84d7d!2s3060%20Rue%20Peugeot%2C%20Laval%2C%20QC%20H7L%205C5!5e0!3m2!1sen!2sca!4v1730227260969!5m2!1sen!2sca" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        
            <h2>Ecosalub Toronto</h2>
            <p>245, Unit 15, Boul. Matheson E.</p>
            <p>Mississauga, Ontario, L4Z 3K2</p>
            <p>CA</p>
            <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5772.935549499578!2d-79.60063699999998!3d43.6592404!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x882b3854b033328f%3A0x5110d53a3049dfa4!2s2601%20Matheson%20Blvd%20E%2C%20Mississauga%2C%20ON%20L4W%205A8!5e0!3m2!1sen!2sca!4v1730227340001!5m2!1sen!2sca" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

        <div class="contact-form">
            <form action="{{ route('contact.submit') }}" method="POST">
                @csrf 
                <h2>Formulaire de contact</h2>
                <table>
                    <tr><td><label for="prenom">Prénom</label></td></tr>
                    <tr><td><input type="text" id="prenom" name="prenom" required></td></tr>

                    <tr><td><label for="nom">Nom de Famille</label></td></tr>
                    <tr><td><input type="text" id="nom" name="nom" required></td></tr>

                    <tr><td><label for="courriel">Courriel</label></td></tr>
                    <tr><td><input type="email" id="courriel" name="courriel" required></td></tr>

                    <tr><td><label for="entreprise">Entreprise</label></td></tr>
                    <tr><td><input type="text" id="entreprise" name="entreprise"></td></tr>

                    <tr><td><label for="zip">Code Postal / ZIP</label></td></tr>
                    <tr><td><input type="text" id="zip" name="zip"></td></tr>

                    <tr><td><label for="telephone">Numéro de téléphone</label></td></tr>
                    <tr><td><input type="tel" id="telephone" name="telephone"></td></tr>

                    <tr><td><label for="sujet">Sujet</label></td></tr>
                    <tr><td>
                        <select id="sujet" name="sujet" required>
                            <option value="service">Service // Maintenance</option>
                            <option value="piece">Pièce // Batterie // Chargeur</option>
                            <option value="equipement">Équipement</option>
                            <option value="soumission">Soumission</option>
                            <option value="carriere">Carrière</option>
                            <option value="facturation">Facturation</option>
                            <option value="financement">Financement</option>
                            <option value="points-de-service">Points de service</option>
                            <option value="autre">Autre</option>
                        </select>
                    </td></tr>

                    <tr><td><label for="message">Message</label></td></tr>
                    <tr><td><textarea id="message" name="message" maxlength="500" required></textarea></td></tr>

                    <tr>
                        <td class="checkbox-container">
                            <input type="checkbox" id="newsletter" name="newsletter" value="1">
                            <label for="newsletter">J'accepte de recevoir les communications Écosalub</label>
                        </td>
                    </tr>

                    <tr><td><button type="submit">Envoyer</button></td></tr>
                </table>
            </form>
        </div>
    </div>
</x-layout>