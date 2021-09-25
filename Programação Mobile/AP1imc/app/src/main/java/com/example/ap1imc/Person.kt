package com.example.ap1imc

class Person {
    private var _name //nome
            : String? = null
    private var _height //altura
            : Double? = null
    private var _weigh //peso
            : Double? = null
    private var _gender //sexo
            : String? = null
    private var _imc //imc
            = 0.0


    fun Person(name: String?, height: Double?, weigh: Double?, gender: String?) {
        _name = name
        _height = height
        _weigh = weigh
        _gender = gender
        _imc = _weigh!! / (_height!! * 2 / 100) //imc vai ser igual ao peso / altura * 2/100
    }

    fun getNome(): String? {
        return _name
    }
    fun getImc(): Double {
        return _imc
    }
    fun getInfoPerson(): String {
        return "Nome ${_name}, peso ${_weigh}, altura: ${_height}, genero: ${_gender}"
    }
}