@extends('client::layouts.default')
@section('client::content')


    <section class="jumbotron text-center esb-green">
        <div class="container">
            <h2 class="jumbotron-heading ">{{  env('APP_NAME') }} API Server</h2>
            <p class="lead text-muted">
                Administrator dashboard
                <strong>{{ $data['client_url'] }}</strong>.

            </p>

            <p class="lead text-muted">
                <a href="#" class="btn btn-primary" onclick="logout();">Uitloggen en sessie eindigen</a>
            </p>

        </div>
    </section>
    <div class="container">


        <div class="row">
            <div class="col-md-12 offset-md-0">
                <section class="jumbotron">
                    <header>
                        <h2>Taal en locatie</h2>
                        <p class="lead text-muted">{{  env('APP_NAME') }} is een meertalig platform</p>
                    </header>
                    <p>
                        Taal instellingen zijn belangrijk in {{  env('APP_NAME') }}. Een creatief idee kan door de vertaalopties in  {{  env('APP_NAME') }} namelijk over de hele wereld worden 'gelokaliseerd'.
                    </p>
                    <p>
                        Je kunt van meerdere talen in 1 omgeving gemakkelijk in de war raken.
                        Daarom is het belangrijk te te stimuleren dat iedere gebruiker van {{  env('APP_NAME') }} collecties en/of attributen toevoegt in zijn of haar eigen moedertaal.
                        Vertalen in een vreemde taal kan immers later altijd nog!
                        Denk dus niet als Nederlander dat je ook wel Engels kunt schrijven. Laat dat een vertaler doen.
                        {{  env('APP_NAME') }} heeft prima functies om vertalers jouw werk om te laten zetten in een andere taal.
                        Wil je zelf je vertalingen schrijven? Dat kan! Maak dan een andere gebruiker aan met de taal waarin je wilt vertalen.
                        <strong>Probeer te voorkomen dat jij of andere gebruikers hun taalinstellingen wijzingen om vertaalwerzaamheden uit te voeren!</strong>
                    </p>
                    <p>Jouw taal is ingesteld op <strong>{{ $data->data->user_language }}</strong>.</p>

                    <p>
                        De standaardtaal voor deze instantie van {{  env('APP_NAME') }} is ingesteld op <strong>{{ $data['default_language'] }}</strong>.
                        Dit betekent dat wanneer om een of andere reden de taal van een gebruiker niet bekend is,
                        het systeem aanneemt dat een collectie (of een attribuut binnen deze collectie) in deze taal is geschreven.
                        Over het algemeen is het verstandig de standaardtaal in te stellen op de taal van het land waar het systeem wordt aangestuurd.
                    </p>
                </section>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12 offset-md-0">
                <section class="jumbotron">
                    <header>
                        <h2>Authenticatie</h2>
                        <p class="lead text-muted">{{  env('APP_NAME') }} authenticatie</p>
                    </header>
                    <h2>Autheticatie op de service bus</h2>
                        Authenticatie op de service bus geschiedt door middel van private API keys.
                        Clients kunnen geen API keys aanmaken.
                    <p>

                    </p>
                    <h2>Authenticatie op clients</h2>
                    <p>
                        De authenticatie kan per client verschillen.
                        Gebruikers kunnen wel of niet bekend zijn als gebruiker op de service bus.
                        Voor clients geldt dat het domein ('mijn.app.com') bekend moet zijn op de service bus, en dat er een API token beschikbaar moet zijn voor dit doemin.
                    </p>


                </section>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12 offset-md-0">
                <section class="jumbotron">
                    <header>
                        <h2>Autorisatie</h2>
                        <p class="lead text-muted">{{  env('APP_NAME') }} gebruikt <em>access control</em> voor autorisatie</p>
                    </header>
                    <p>
                        <strong>Gebruikers</strong> worden binnen {{  env('APP_NAME') }} geautorisieerd op de bevoegdheid van taken (<em>methoden</em>).
                        Permissies voor het uitvoeren van taken zijn als volgt gecatagoriseerd (<em>CRUDD</em>):
                        <ul>
                            <li>Create: createXMethod()</li>
                            <li>Read:   getXMethod()</li>
                            <li>Update: saveXMethod()</li>
                            <li>Delete: deleteXMethod() - soft delete</li>
                            <li>Destroy: destroyXMethod()</li>
                        </ul>
                    </p>


                    <p>
                        Een <strong>domein</strong> is een Collectie van Collecties (dit kunnen dus <em>ook</em> gebruikers en groepen zijn) met tenminste de volgende attributen:
                    <ul>
                        <li>Collectie id</li>
                        <li><strong>C</strong>reate recht <code>boolean</code></li>
                        <li><strong>R</strong>read recht <code>boolean</code></li>
                        <li><strong>U</strong>update recht <code>boolean</code></li>
                        <li><strong>D</strong>delete recht <code>boolean</code></li>
                    </ul>
                    Een typisch gebruik van een domein is een internet domein.
                    Zo kunnen bepaalde collecties horen bij het domein www.website.com.
                    Bepaalde collecties uit het domein domein www.website.com horen bij het domein blog.website.com, aangevuld met andere collecties.
                    </p>
                    <p>
                        Een <strong>groep</strong> is een Collectie van personen met tenminste de volgende attributen:
                    <ul>
                        <li>Collectie id</li>
                        <li><strong>C</strong>reate recht <code>boolean</code></li>
                        <li><strong>R</strong>read recht <code>boolean</code></li>
                        <li><strong>U</strong>update recht <code>boolean</code></li>
                        <li><strong>D</strong>delete recht <code>boolean</code></li>
                    </ul>
                    </p>

                    <p>
                        Een gebruiker (Schema: <a href="http://schema.org/Person">Person</a>) is een Collectie met tenminste de volgende attributen:
                        <ul>
                            <li>Collectie id</li>
                            <li>API key <code>api_key</code></li>
                            <li>E-mail <code>email</code></li>
                            <li>Wachtwoord <code>password</code><br /><small>itemscope itemtype<a href="http://schema.org/accessCode">accessCode</a></small></li>
                            <li>Naam <code>name</code><br /><small>itemprop="user" itemscope itemtype="http://schema.org/Person"  </small></li>
                            <li>Afbeelding(en)</li>
                            <li><strong>Groep(en)</strong></li>
                            <li><strong>Domein(en)</strong></li>
                        </ul>
                    </p>


                    <h3>Hierarchische autorisatie</h3>
                    <p>
                        Autorisatie wordt op grond van permissies op opeenvolgende attributen van de gebruiker verleend:
                    <ul>
                        <li>Heeft het <strong>domein</strong> van de gebruiker toegang tot de methode?</li>
                        <li>Heeft de  <strong>groep</strong> waartoe de gebruiker toegang tot de methode?</li>
                        <li>Heeft de  <strong>gebruiker</strong> toegang tot de methode?</li>
                    </ul>
                    </p>
                    <p>
                        Iedere class en methode van de {{  env('APP_NAME') }} API (met uitzondering van de publieke API) wordt gecontroleerd op deze mapping:

                    <table class="table table table-inverse">
                        <thead>
                        <tr>
                            <th></th>
                            <th>domain</th>
                            <th>group</th>
                            <th>user</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">Create</th>
                            <td><code>boolean</code></td>
                            <td><code>boolean</code></td>
                            <td><code>boolean</code></td>
                        </tr>
                        <tr>
                            <th scope="row">Read</th>
                            <td><code>boolean</code></td>
                            <td><code>boolean</code></td>
                            <td><code>boolean</code></td>
                        </tr>
                        <tr>
                            <th scope="row">Update</th>
                            <td><code>boolean</code></td>
                            <td><code>boolean</code></td>
                            <td><code>boolean</code></td>
                        </tr>
                        <tr>
                            <th scope="row">Delete</th>
                            <td><code>boolean</code></td>
                            <td><code>boolean</code></td>
                            <td><code>boolean</code></td>
                        </tr>
                        <tr>
                            <th scope="row">Destroy</th>
                            <td><code>boolean</code></td>
                            <td><code>boolean</code></td>
                            <td><code>boolean</code></td>
                        </tr>
                        </tbody>
                    </table>

                    </p>
                    <h4>Voorbeeld</h4>
                    <p>
                        Hieronder een voorbeeld van de website landingpage.com

                    <table class="table table table-inverse">
                        <thead>
                        <tr>
                            <th></th>
                            <th>domain landingpage.com</th>
                            <th>group anonymous</th>
                            <th>user anonymous</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">Create</th>
                            <td><code>false</code></td>
                            <td><code>false</code></td>
                            <td><code>false</code></td>
                        </tr>
                        <tr>
                            <th scope="row">Read</th>
                            <td><code>true</code></td>
                            <td><code>true</code></td>
                            <td><code>true</code></td>
                        </tr>
                        <tr>
                            <th scope="row">Update</th>
                            <td><code>false</code></td>
                            <td><code>false</code></td>
                            <td><code>false</code></td>
                        </tr>
                        <tr>
                            <th scope="row">Delete</th>
                            <td><code>false</code></td>
                            <td><code>false</code></td>
                            <td><code>false</code></td>
                        </tr>
                        <tr>
                            <th scope="row">Destroy</th>
                            <td><code>false</code></td>
                            <td><code>false</code></td>
                            <td><code>false</code></td>
                        </tr>
                        </tbody>
                    </table>

                    </p>



                </section>
            </div>
        </div>




        @if ( env('APP_ENV') == 'local')
        <div class="row">
            <div class="col-md-12 offset-md-0">
                <section class="jumbotron">
                    <header>
                        <h2 class="bd-title">Collecties</h2>
                        <p>De 'local' environment' laat tijdelijk collecties zien en enkele handelingen. <strong>De Service Bus is eigenlijk niet voor deze handelingen bedoeld!</strong>.</p>
                        <p>Dit gehele overzicht en alle handelingen worden uitgevoerd door de <i>factory class</i> <strong>servicebus/packages/esb/artifact/src/Manager.php</strong> (Esb\Artifact\Manager) </p>
                    </header>
                    <ul>
                    @foreach ( $data['collections'] as $collection )
                        <li>
                            <hr />
                        <h3>Collection {{ $collection['id'] }}</h3>

                        @if($collection['attributes'] )
                            <h4>Attributes</h4>
                            <ul>
                                @foreach ( $collection['attributes']  as $attribute )
                                    <li>{{  $attribute['id'] }}: {{  $attribute['caption'] }} ({{  $attribute['caption_id'] }})| {{  $attribute['text']}} ({{  $attribute['text_id'] }})</li>
                                @endforeach
                            </ul>
                        @else
                            <h4>No attributes</h4>
                        @endif

                            @if($collection['childs'])
                            <h4>Childs</h4>
                            <ul>
                            @foreach($collection['childs'] as $child )
                                <li>Child id: {{ $child['id'] }}</li>
                            @endforeach
                            </ul>
                            @endif

                            @if($collection['parents'])
                            <h4>Parents</h4>
                            <ul>
                                @foreach($collection['parents'] as $parent )
                                    <li>Parent id: {{ $parent['id'] }}</li>
                                @endforeach
                            </ul>
                            @endif


                        </li>
                    @endforeach
                    </ul>
               </section>
           </div>
       </div>
       @endif

   <div class="row">
       <div class="col-md-12 offset-md-0">
           <section class="jumbotron">
               <header>
                   <h2 class="bd-title">Jouw gegevens</h2>
                   <p><strong>Todo: </strong>Op dit moment is het nog niet mogelijk super-admin gegevens te wijzigen. De knoppen werken wel, maar doen niets.</p>
               </header>
               <hr />
               <p>Je account is aangemaakt op {{ $data['user']->created_at }}.</p>
               <p>De API key die is aangemaakt om te kunnen inloggen is geldig tot {{ date('Y-m-d H:i:s', $data['user']->api_key_expires) }}.</p>
               <div class="input-group">
                   <span class="input-group-addon" id="sizing-addon2">Uri</span>
                   <input type="text"  class="form-control" placeholder="" value="{{ $data['user']->uri }}" aria-label="Uri" disabled aria-describedby="sizing-addon2">
               </div>
               <p>Het 'uri' veld geeft aan dat de gebruiker een website is. Dit veld moet voor jou als super-admin leeg blijven.</p>
               <br>
               <!-- set values -->
               <script>
                   function setValue( inputname  ) {
                       var titleText = 'No title';
                       if ( inputname == 'input-email')  titleText = 'Geef een nieuwe email';
                       if ( inputname == 'input-name')  titleText = 'Geef een nieuwe naam';
                       if ( inputname == 'input-password')  titleText = 'Geef een nieuw wachtwoord';
                       if ( inputname == 'input-password') $("#" + inputname).prop("type", "text");
                       swal({
                           title: titleText,
                           input: 'text',
                           inputPlaceholder: '',
                           showCancelButton: true,
                           inputValidator: function (value) {
                               return new Promise(function (resolve, reject) {
                                   if (value) {
                                       resolve()
                                   } else {
                                       reject('You need to write something!')
                                   }
                               })
                           }
                       }).then(function (name) {
                           swal({
                               type: 'success',
                               title: 'Gelukt',
                               text: 'De nieuwe waarde is  ' + name
                           })
                       })
                   }
               </script>

               <div class="input-group">
                   <span class="input-group-addon" id="sizing-addon2">E-mail</span>
                   <input type="text" id="input-email" class="form-control" placeholder="Email" value="{{ $data['user']->email }}" aria-label="Email" disabled aria-describedby="sizing-addon2">
                   <span class="input-group-btn">
                   <button class="btn btn-secondary" type="button" onclick="setValue('input-email')">Bewerk</button>
                   </span>
               </div>
               <br />
               <div class="input-group">
                   <span class="input-group-addon" id="sizing-addon2">Wachtwoord</span>
                   <input type="password" id="input-password" class="form-control" placeholder="Wachtwoord" value="{{ $data['user']->password }}" aria-label="Wachtwoord" disabled aria-describedby="sizing-addon2">
                   <span class="input-group-btn">
                   <button class="btn btn-secondary" type="button" onclick="setValue('input-password')">Bewerk</button>
                   </span>
               </div>
               <br />
               <div class="input-group">
                   <span class="input-group-addon" id="sizing-addon2">Naam</span>
                   <input type="text" id="input-name" class="form-control" placeholder="Username" value="{{ $data['user']->name }}" aria-label="Username" disabled aria-describedby="sizing-addon2">
                   <span class="input-group-btn">
                   <button class="btn btn-secondary" type="button" onclick="setValue('input-name')">Bewerk</button>
                   </span>
               </div>
               <br />
               <!-- language selector -->
               <script>
                   function setLanguage(){


                       swal({
                           title: 'Selecteer je taal',
                           text: 'Selecteer hier je eigen taal.',
                           input: 'select',
                           inputOptions: {
                               @foreach( $data['languages'] as $language)
                                   '{{ $language->id }}' : '{{ $language->local_name }}',

                               @endforeach
                           },
                           inputPlaceholder: 'Selecteer je taal',
                           showCancelButton: true,
                           inputValidator: function (value) {
                               return new Promise(function (resolve, reject) {
                                   if (value === 'UKR') {
                                       resolve()
                                   } else {
                                       reject('You need to select Ukraine :)')
                                   }
                               })
                           }
                       }).then(function (result) {
                                swal({
                                    type: 'success',
                                    html: 'You selected: ' + result
                                })
                            })
                        }
                    </script>
                    <div class="input-group">
                        <span class="input-group-addon" id="sizing-addon2">Taal</span>
                        <input type="text" class="form-control" placeholder="Taal" value="{{ $data['user_language'] }}" aria-label="Taal" disabled aria-describedby="sizing-addon2">
                        <span class="input-group-btn">
                        <button class="btn btn-secondary" type="button" onclick="setLanguage()">Bewerk</button>
                        </span>
                    </div>
                    <br>



                </section>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 offset-md-0">
                <section class="jumbotron">
                    <header>
                        <h2 class="bd-title">Uitgegeven API keys</h2>

                    </header>
                    <h3>Gebruikers</h3>
                    <p class="bd-lead">
                        Hieronder zie je het overzicht van de aan users door de API server uitgegeven API keys.
                    </p>
                    <p>
                        <strong>Opmerking:</strong> Onder 'users' vallen alle geregistreerde gebruikers van de API (zoals websites, diensten, administrators, etc.).
                    </p>

                    <ul>
                        @foreach ($data['users'] as $user)
                            <li>{{$user->email}}<br /><span style="font-size: 40%;">{{ $user->api_key }}</span></li>
                        @endforeach
                    </ul>



                </section>
            </div>
        </div>


    </div>




    @include('client::assets.js.auth_js')
@stop