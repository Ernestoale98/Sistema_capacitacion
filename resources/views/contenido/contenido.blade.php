    @extends('principal')
    @section('contenido')
    <template v-if="menu==0">
        <h1>Variable menu es igual a 0</h1>
    </template>
    <template v-if="menu==1">
        <categoria></categoria>
    </template>
    <template v-if="menu==2">
        <articulo></articulo>
    </template>
    <template v-if="menu==3">
        <h1>Variable menu es igual a 3 </h1>
    </template>
    <template v-if="menu==4">
        <proveedor></proveedor>
    </template>
    <template v-if="menu==5">
        <h1>Variable menu es igual a 5 </h1>
    </template>
    <template v-if="menu==6">
        <cliente></cliente>
    </template>
    <template v-if="menu==7">
        <user></user>
    </template>
    <template v-if="menu==8">
        <rol></rol>
    </template>
    <template v-if="menu==9">
        <h1>Variable menu es igual a 9 </h1>
    </template>
    <template v-if="menu==10">
        <h1>Variable menu es igual a 10 </h1>
    </template>
    <template v-if="menu==11">
        <h1>Variable menu es igual a 11 </h1>
    </template>
    <template v-if="menu==12">
        <h1>Variable menu es igual a 12 </h1>
    </template>

    @endsection