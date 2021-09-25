package com.example.ap1imc

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import kotlinx.android.synthetic.main.activity_result.*

class ResultActivity : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        val _service: IFunctions = Functions()
        setContentView(R.layout.activity_result)

        //recuperando os dados
        val dados = intent.extras;
        val imc = dados?.getDouble("imc");
        val sexo = dados?.getString("sexo").toString();
        val nome = dados?.getString("nome").toString();
        if(imc != null){
            imcResultNumber.text = imc.toString();
            val messageParam: String = _service.getMessageParams(imc, sexo, applicationContext);
            messageNome.text = nome;
            imcMessage.text = messageParam;
            _service.notify(applicationContext,"${messageParam}")
        }

    }
}