package com.example.ap1imc

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.widget.CompoundButton
import com.example.ap1imc.Person;
import com.example.ap1imc.Functions;
import com.example.ap1imc.AppPatters;

import kotlinx.android.synthetic.main.activity_main.*
class MainActivity : AppCompatActivity() {
    val patters: AppPatters = AppPatters()
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)
        val _service: IFunctions = Functions();
        onChecked() // mantem as selections box com apenas um valor, assim não permitindo ser feminino e masculino ao msm tempo

        btnCalc.setOnClickListener {
            var peso: String = etPeso.text.toString();
            var altura: String = etAltura.text.toString();
            var nome: String = etNome.text.toString();
            var sexo: String = getGender();
            if(sexo == ""){
                _service.notify(applicationContext, "Para um calculo consiso, insira o sexo apropriadamente")
                return@setOnClickListener
            }
            if(peso != "" && altura != "") {
                val person: Person = Person();
                person.Person(nome,altura.toDouble(),peso.toDouble(),sexo);
                val imc = patters.format.format(person.getImc())
                showResult(imc.toDouble(),sexo, nome)
                cleanFields()
            }
            else{
                _service.notify(applicationContext, "Os campos de altura e peso devem ser preenchidos corretamente")
            }
        }
    }
    //limpar os campos do form
    private fun cleanFields(){
        etPeso.text?.clear()
        etAltura.text?.clear()
        etNome.text?.clear()
        masculino.isChecked = false;
        feminino.isChecked = false;

    }
    private fun showResult(imc: Double, sexo: String, nome: String){
        var secondScreen = Intent(this, ResultActivity::class.java);
        //passar a data
        secondScreen.putExtra("imc", imc);
        secondScreen.putExtra("sexo", sexo)
        secondScreen.putExtra("nome", nome)

        //puxar a tela
        startActivity(secondScreen)
    }

    private fun onChecked(){
        masculino.setOnCheckedChangeListener(object: CompoundButton.OnCheckedChangeListener {
            override fun onCheckedChanged(buttonView: CompoundButton?, isChecked: Boolean) {
                if (isChecked){
                    feminino.isChecked = false
                }
            }
        })

        feminino.setOnCheckedChangeListener(object: CompoundButton.OnCheckedChangeListener {
            override fun onCheckedChanged(buttonView: CompoundButton?, isChecked: Boolean) {
                if (isChecked){
                    masculino.isChecked = false
                }
            }
        })
    }
    private fun getGender(): String{
        if(masculino.isChecked){
            return applicationContext.getString(R.string.masculino)
        }else if(feminino.isChecked){
            return applicationContext.getString(R.string.masculino)
        }else{
            return ""
        }
    }
}