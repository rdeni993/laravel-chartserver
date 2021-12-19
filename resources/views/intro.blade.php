@extends('welcome')

@section('pageContent')
    <div id="faq">
        
    <h3>Kako koristiti aplikaciju</h3>

    <h5>Kreiranje grafikona</h5>
    <p>
        Grafikon je vrsta slike sa vizualnim prikazom rasta vrijednosti upisanih podataka. Ova aplikacija na najjednostavniji način omogućava administratoru 
        grafikona da izradi grafikon i prikaže ga na svojoj stranici. Kako bi najbrže dodali grafikon na svoju stranicu potrebno je pratiti sledeće korake.
    
        <ol>
            <li>Izradite svoj nalog na aplikaciji! Kliknite <a href="{{ url('/register') }}" target="_blank">ovdje!</a></li>
            <li>Prijavite se na svoj nalog na aplikaciji! Kliknite <a href="{{ url('/login') }}"  target="_blank">ovdje!</a></li>
            <li>Super sada ste spremni. U opcijama odaberite opciju kreiraj grafikon i u ponuđeno polje unesit naziv pomoću kojeg ćete u budućnosti raspoznavat grafikon.</li>
            <li>
                Kada ste kreirali grafikon možete početi dodavati vrijednosti cijena koje su vezane za ponuđeni grafikon koristeći opciju "Dodaj cijenu".
                Kako bi ste dodali cijenu potrebno je odabrati datum za koji cijena važi, automatskim odabirom uvijek je odabran datum na dan unosa. Ako se cijene 
                dodaju jedan puta dnevno ovdje ne bi trebalo biti pogrešaka. Zatim je potrebno unijeti cijenu ( dozvoljene su 4 decimale iza decimalne tačke i osam 
                znamenki sa lijeve strane ). Sledeća opcija jeste da odaberete grafikon za koji se cijena odnosi. <strong>Bitno je da grafikoni imaju različita imena 
                    kako ne bi došlo do zabune!
                </strong>
            </li>
            <li>Nakon što unsete dovoljan broj cijena, koje se naravno mogu i naknadno dodavati vrijeme je da upoznati svoj grafikon. U listi sa opcijama birate opciju 
                "Pregledaj grafikone" i zatim da kliknete na željeni grafikon. Tada dobijate sve upisane vrijednosti poredane po vremenu unosa. U slučaju da trebate izmjeniti 
                dovoljno je upisati novu vrijednost umjesto stare i kliknuti na dugme Update na dnu liste.  
            </li>
        </ol>
    </p>

    <h5>Instaliranje grafikona</h5>
    <p>
        Kada ste uspješno kreirali grafikon vrijeme je da se prikaže na željenoj web stranici. Bitno je pažljivo uključiti sve skripte kako bi grafikoni pravilno 
        funkcionisali!
    </p>
    <p>
        <ol>
            <li>Kreirajte stranicu gdje želite graifkon! Bez obzira da li se radi o CMS sistemu ili običnim HTML stranicama potrebno je napraviti blok 
                gdje će se grafikon prikazivati. Grafikon se prikazuje u odnosu na veličinu okvira!
            </li>
            <li>
                U <code>&lt;head&gt;</code> tagu potrebno je uključiti skripte od kojih zavisi rad grafikona!
                <ol>
                    <li>
                        <p><strong>Uključite jQuery</strong></p>
                        <code>
                            &lt;script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"&gt;&lt;/script&gt;
                        </code>
                    </li>
                    <li>
                        <p><strong>Uključite Font Awesome</strong></p>
                        <code>
                            &lt;link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" /&gt;
                        </code>
                    </li>
                    <li>
                        <p><strong>Uključite Bootstrap</strong></p>
                        <code>
                            &lt;link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" /&gt;
                        </code>
                        <code>
                            &lt;script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.jss"&gt;&lt;/script&gt;
                        </code>
                    </li>
                    <li>
                        <p><strong>Uključimo Javascript biblioteku za grafikone</strong></p>
                        <code>
                            &lt;script src="https://cdn.jsdelivr.net/npm/chart.js@3.6.2/dist/chart.min.js"&gt;&lt;/script&gt;
                        </code>
                    </li>
                    <li>
                        <p><strong>Uključimo Javascript adapter za vrijeme</strong></p>
                        <code>
                            &lt;script src="https://cdn.jsdelivr.net/npm/luxon@^2"&gt;&lt;/script&gt;
                        </code>
                        <code>
                            &lt;script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-luxon@^1"&gt;&lt;/script&gt;
                        </code>
                    </li>
                    <li>
                        <p><strong>Uključimo biblioteke bitne za Zoomiranje</strong></p>
                        <code>
                            &lt;script src="https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.8/hammer.min.js" integrity="sha512-UXumZrZNiOwnTcZSHLOfcTs0aos2MzBWHXOHOuB0J/R44QB0dwY5JgfbvljXcklVf65Gc4El6RjZ+lnwd2az2g==" crossorigin="anonymous" referrerpolicy="no-referrer"&gt;&lt;/script&gt;
                        </code>
                        <code>
                            &lt;script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-zoom/1.2.0/chartjs-plugin-zoom.min.js" integrity="sha512-TT0wAMqqtjXVzpc48sI0G84rBP+oTkBZPgeRYIOVRGUdwJsyS3WPipsNh///ay2LJ+onCM23tipnz6EvEy2/UA==" crossorigin="anonymous" referrerpolicy="no-referrer"&gt;&lt;/script&gt;
                        </code>
                    </li>
                    <li>
                        <p><strong>Potrebno je dodati sledeće izmjene<code>head</code></strong></p>
                        <code>
                            &lt;style&gt; 
                                body,
                                html {
                                    background: #fbfbfd;
                                    font-family: 'Noto Sans';
                                }
                                /* ::-webkit-calendar-picker-indicator {
                                    filter: invert(1);
                                }*/
                                
                                .bg-blue {
                                    background: #1F406D;
                                    color: #fff;
                                }
                                
                                button,
                                input {
                                    outline: none;
                                }
                                
                                button::focus {
                                    outline: none;
                                }
                                
                                .card-footer,
                                input,
                                button {
                                    font-size: .9em!important;
                                }
                            &lt;/style&gt;
                        </code>
                    </li>
                </ol>
            </li>
        </ol>
    </p>

    <p>
        U slučaju da koristite CMS potrebno je obezbjediti da se ove datoteke nalaze na pravom mjestu i poredane ovim rasporedom. Nakon toga dodajemo grafikon
        na samu stranicu. Ako već nemate mjesto gdje će se nalaziti grafikon onde se potrudite da obezbjedite. Grafikon se prilagođava veličini samoga 
        bloka gdje se nalazi. Na to treba posebno paziti!
    </p>

    <ol>
        <li>
            <p><strong>Unutar kreiranog bloka dodajte HTML kod koji predstavlja grafikon</strong></p>
            <pre>
                &lt;div class="card mt-5"&gt;
                &lt;div class="card-header bg-transparent"&gt;
                &lt;div class="d-flex justify-content-between"&gt;
                &lt;h5 class="p-0 mt-2"&gt;ChartJs Product&lt;/h5&gt;
                &lt;button class="btn" id="print"&gt;&lt;i class="fa fa-print">&lt;/i&gt; Print&lt;/button&gt;
                &lt;/div&gt;
                &lt;/div&gt;
                &lt;div class="card-body"&gt;
                &lt;canvas id="dChart">&lt;/canvas&gt;
                &lt;/div&gt;
                &lt;div class="card-footer bg-transparent"&gt;
                &lt;div class="row my-2"&gt;
                &lt;div class="col-lg-12"&gt;
                &lt;h4&gt;regled vrijednosti NVI&lt;/h4&gt;
                &lt;/div&gt;
                            &lt;div class="col-lg-3"&gt;
                            &lt;label&gt;Od&lt;/label&gt;
                            &lt;input type="date" name="dateFrom" class="form-control" /&gt;
                            &lt;/div&gt;
                            &lt;div class="col-lg-3"&gt;
                            &lt;label&gt;Do&lt;/label&gt;
                            &lt;input type="date" name="dateTo" class="form-control" /&gt;
                            &lt;/div&gt;
                            &lt;div class="col-lg-6"&gt;
                            &lt;label class="d-block text-transparent"&gt;.&lt;/label&gt;
                            &lt;button class="btn btn-primary" id="demand-chart"&gt;&lt;i class="fa fa-search"&gt;&lt;/i&gt; Look&lt;/button&gt;
                            &lt;button class="btn btn-primary" id="demand-chart-reload"&gt;&lt;i class="fa fa-refresh"&gt;&lt;/i&gt; Reset&lt;/button&gt;
                            &lt;/div&gt;
                            &lt;/div&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;
            </pre>
        </li>

        <li>
            <p><strong>Dodajte Kod za crtanje grafikona</strong></p>
            <p>Prijavite se na aplikaciju i iz menija odaberite opciju "Pregledaj grafikona". Na vrhu stranice se u crnom bloku nalazi kod koji je 
                specifičan za svaki grafikon. Kopirajte ga i dodajte na dno 
                <code>body</code> taga.

                <code>
                    &lt;script id="d-chart" data-chart="19" data-src="http://localhost:8000" src="http://localhost:8000/api/chart/api/script"&gt;&lt;/script&gt;
                </code>
            </p>
        </li>
    </ol>


    <p>I to je to. Ako ste sve uradili upravo bi trebali imati grafikon unutar svoje aplikacije!</p>

    </div>
@endsection