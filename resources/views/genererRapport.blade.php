
<!-- PAGE 3 : Données techniques et surfaces -->
<h2 class="section-title">Données techniques</h2>
<p>
Surface terrain : {{ $projet->donneesTechnique->surface }} m²<br>
Débit fuite : {{ $projet->donneesTechnique->debit_fuite }} L/s<br>
Période : {{ $projet->donneesTechnique->periode }} ans<br>
Zone : {{ $projet->donneesTechnique->zone }}<br>
Type principal : {{ $projet->donneesTechnique->nature }}
</p>

<h2 class="section-title">Surfaces détaillées</h2>
@if($projet->donneesTechnique->surfaces->count())
<table>
    <thead>
        <tr>
            <th>Type</th>
            <th>Surface (m²)</th>
            <th>Coef C</th>
        </tr>
    </thead>
    <tbody>
        @foreach($projet->donneesTechnique->surfaces as $surface)
        <tr>
            <td>{{ $surface->type }}</td>
            <td>{{ $surface->surface }}</td>
            <td>{{ $surface->coef_c }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<p>Aucune surface renseignée.</p>
@endif

</body>
</html>
