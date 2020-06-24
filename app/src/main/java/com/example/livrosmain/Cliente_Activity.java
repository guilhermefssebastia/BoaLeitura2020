package com.example.livrosmain;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.text.TextUtils;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

public class Cliente_Activity extends AppCompatActivity {


    EditText Edit_NomeCli, Edit_EmailCli, Edit_Cpfcli, Edit_TelCli, Edit_EndCli, Edit_CEPcli;
    Button btnCriaCli;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.cliente_layout);
        btnCriaCli = (Button) findViewById(R.id.btnCriaCli);
        Edit_NomeCli = (EditText) findViewById(R.id.Edit_NomeCli);
        Edit_EmailCli = (EditText) findViewById(R.id.Edit_EmailCli);
        Edit_Cpfcli = (EditText) findViewById(R.id.Edit_Cpfcli);
        Edit_TelCli = (EditText) findViewById(R.id.Edit_TelCli);
        Edit_EndCli = (EditText) findViewById(R.id.Edit_EndCli);
        Edit_CEPcli = (EditText) findViewById(R.id.Edit_CEPcli);

        btnCriaCli.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                String nomeCli = Edit_NomeCli.getText().toString().trim();
                String emailCli = Edit_EmailCli.getText().toString().trim();
                String CPFcli = Edit_Cpfcli.getText().toString().trim();
                String TelCli = Edit_TelCli.getText().toString().trim();
                String EndCli = Edit_EndCli.getText().toString().trim();
                String CEPcli = Edit_CEPcli.getText().toString().trim();
                startActivity(new Intent(getApplicationContext(), Login_Activity.class));
            }
        });


    }
}