@extends('layouts.app')
@section('content')

 <tbody>
     @foreach ($cours as $cour)
     <tr>
         <th scope="row">1</th>
         <td>{{ $cour->titre }}</td>
         <td>{{ $cour->fichier}}</td>
         <td>{{ $cour->semestre}}</td>
         <td>{{ $cour->descriptions }}</td>
         <td>{{ $cour->matiere->titre }}</td>
         <td>{{ $cour->user->nom}}</td>
         <td>
             <a href="{{url('cours/' .$cour->id)}}">
                 <button class="btn btn-primary mb-1" type="submit">Detaille</button>
             </a>
             <form method="POST" action="{{ url('/cours/delete/' . $cour->id)}}">
                 {{method_field('delete')}}
                 @csrf

                 <button class="btn btn-icon btn-icon-end btn-primary mb-1" type="button">
                     <span>Delete</span>
                     <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-bin undefined">
                         <path d="M4 5V14.5C4 15.9045 4 16.6067 4.33706 17.1111C4.48298 17.3295 4.67048 17.517 4.88886 17.6629C5.39331 18 6.09554 18 7.5 18H12.5C13.9045 18 14.6067 18 15.1111 17.6629C15.3295 17.517 15.517 17.3295 15.6629 17.1111C16 16.6067 16 15.9045 16 14.5V5"></path>
                         <path d="M14 5L13.9424 4.74074C13.6934 3.62043 13.569 3.06028 13.225 2.67266C13.0751 2.50368 12.8977 2.36133 12.7002 2.25164C12.2472 2 11.6734 2 10.5257 2L9.47427 2C8.32663 2 7.75281 2 7.29981 2.25164C7.10234 2.36133 6.92488 2.50368 6.77496 2.67266C6.43105 3.06028 6.30657 3.62044 6.05761 4.74074L6 5"></path>
                         <path d="M2 5H18M12 9V13M8 9V13"></path>
                     </svg>
                 </button>
             </form>
         </td>
     </tr>
     @endforeach
 </tbody>
 @endsection
