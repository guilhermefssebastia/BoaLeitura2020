package com.example.livrosmain;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

public class Login_Activity extends AppCompatActivity {
    EditText txtEmail, txtPassword;
    Button btnIrCadastro, btnLogar, btnSair;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.login_layout);

        btnIrCadastro = findViewById(R.id.btnIrCadastro);
        btnLogar = findViewById(R.id.btnLogar);
        txtEmail = findViewById(R.id.txtEmail);
        txtPassword = findViewById(R.id.txtPassword);
        btnSair = findViewById(R.id.btnSair);

        btnSair.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                finish();
            }
        });

        btnLogar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                String txUsuario = txtEmail.getText().toString();
                String txSenha = txtPassword.getText().toString();

                if (txUsuario.equals("guilherme")&&txSenha.equals("12345")){

                    Intent abrir = new Intent(Login_Activity.this,CadastrarLivro.class);
                    startActivity(abrir);

                    Toast.makeText(getApplicationContext(),
                            "Bem vindo ao Boa Leitura",
                            Toast.LENGTH_SHORT).show();
                }else{
                    Toast.makeText(getApplicationContext(),
                            "Usuário ou senha inválidos",
                            Toast.LENGTH_SHORT).show();
                }
            }
        });
        btnIrCadastro.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent abrir = new Intent(Login_Activity.this, Cliente_Activity.class);
                startActivity(abrir);
            }
        });
            }


    }
