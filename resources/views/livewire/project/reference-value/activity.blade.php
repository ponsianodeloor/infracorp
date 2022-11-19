<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}

    <x-adminlte-select  wire:model="lst_infraestructures" name="lst_infraestructures" label="Infraestructure"
                       label-class="text-lightblue">
        <x-slot name="prependSlot">
            <div class="input-group-text bg-gradient-info">
                <i class="fas fa-sitemap"></i>
            </div>
        </x-slot>
        <option value=''>Seleccionar</option>
        @foreach($infraestructures as $infraestructure)
            <option value="{{$infraestructure->id}}">{{$infraestructure->infraestructure}}</option>
        @endforeach
    </x-adminlte-select>

    @if(count($infraestructure_types) > 0)
        <x-adminlte-select  wire:model="lst_infraestructure_types" name="lst_infraestructure_types" label="Tipo" label-class="text-lightblue">
            <x-slot name="prependSlot">
                <div class="input-group-text bg-gradient-info">
                    <i class="fas fa-sitemap"></i>
                </div>
            </x-slot>
            <option value=''>Seleccionar</option>
            @foreach($infraestructure_types as $infraestructure_type)
                <option value="{{$infraestructure_type->id}}">{{$infraestructure_type->type}}</option>
            @endforeach
        </x-adminlte-select>

        <x-adminlte-input name="activity"
                          label="Actividad"
                          placeholder="Actividad" label-class="text-lightblue">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-user text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-input name="reference_amount"
                          label="Monto Referencial"
                          placeholder="Monto Referencial" label-class="text-lightblue">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-user text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-input name="reference_amount_inspection"
                          label="Monto Referencial Fiscalizacion"
                          placeholder="Monto Referencial Fiscalizacion" label-class="text-lightblue">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-user text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-button label="Guardar" theme="primary btn-block" icon="fas fa-save" type="submit"/>


    @endif
</div>
