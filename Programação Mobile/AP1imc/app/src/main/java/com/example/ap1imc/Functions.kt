package com.example.ap1imc

import android.content.ContentResolver
import android.content.Context
import android.provider.Settings.Global.getString
import android.widget.Toast
import kotlinx.android.synthetic.main.activity_main.*

interface IFunctions {
    fun getMessageParams(imc: Double, sexo: String,applicationContext: Context): String;
    fun notify(applicationContext: Context,text: String);
}
class Functions : IFunctions{
    override fun getMessageParams(imc: Double, sexo: String, applicationContext: Context): String {
        var ctx = applicationContext;
        if (sexo == ctx.resources.getString(R.string.feminino)) {
            return when (imc) {
                in 0.0..19.1 -> ctx.resources.getString(R.string.f1);
                in 19.1..25.8 -> ctx.resources.getString(R.string.f2);
                in 25.8..27.3 -> ctx.resources.getString(R.string.f3);
                in 27.3..32.3 -> ctx.resources.getString(R.string.f4);
                else -> ctx.resources.getString(R.string.f5);
            }
        } else if (sexo == ctx.resources.getString(R.string.masculino)) {
            return when (imc) {
                in 0.0..20.7 -> ctx.resources.getString(R.string.f1);
                in 20.7..26.4 -> ctx.resources.getString(R.string.f2);
                in 26.4..27.8 -> ctx.resources.getString(R.string.f3);
                in 27.8..31.1 -> ctx.resources.getString(R.string.f4);
                else -> ctx.resources.getString(R.string.f5)
            }
        }else{
            return ctx.resources.getString(R.string.f6);
        }
    }
    override fun notify(applicationContext: Context, text: String) {
        val duration = Toast.LENGTH_SHORT;
        val toast = Toast.makeText(applicationContext, text, duration)
        toast.show()
    }
}
