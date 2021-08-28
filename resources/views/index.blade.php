<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Bravi-Test</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    </head>
    <body class="antialiased">
        <div id="app">
            <nav>
                <div class="nav-wrapper">
                <a href="#" class="brand-logo center">Bravi Test</a>
                </div>
            </nav>

            <div class="row">
                <div class="col s12 m12">
                <div class="card blue-grey darken-1">
                    <div class="card-content white-text">
                        <span class="card-title">Contact List Frontend</span>
                        <p>Create a web app which explores the API built in the second assignment.The UI design is totally up to you.</p>
                    </div>
                    <div class="card-action">
                        <a href="#table">Check this out!</a>
                    </div>
                </div>
                </div>
            </div>

            <div id="table" class="row">
                <div class="col s6 m6 push-s3 push-m3">
                    <table class="highlight">
                        <caption></caption>
                        <thead>
                            <tr>
                                <th id="id"># ID</th>
                                <th id="name">Name</th>
                                <th id="contact">Contact</th>
                                <th id="email">E-mail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="person in people" :key="person.id">
                                <td>@{{ person.id }}</td>
                                <td>@{{ person.name }}</td>
                                <td><template v-for="aux in person.contact"><p>@{{ aux.number }}</p></template></td>
                                <td><template v-for="aux in person.contact"><p>@{{ aux.email }}</p></template></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
             
        </div>

        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

        <script>
            var app = new Vue({
                el: "#app",
                data: { 
                    people: ''
                },
                mounted () {
                    axios.get('http://127.0.0.1:8000/api/people').then(response => (this.people = response.data))
                }
            });
        </script>
    </body>
</html>
