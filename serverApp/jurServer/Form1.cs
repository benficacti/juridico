
using Newtonsoft.Json;
using System;
using System.Drawing;
using System.IO;
using System.Net;
using System.Windows.Forms;

namespace jurServer
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        private void Form1_Load(object sender, EventArgs e)
        {
            lblResposta.Text = "LIGADO";
            lblResposta.ForeColor = Color.Green;  request.Start();

        }

        private void request_Tick(object sender, EventArgs e)
        {
            try
            {
                
                var httpWebRequest = (HttpWebRequest)WebRequest.Create("http://192.168.0.15/juridico/dashboard/apiServer/api.php");
                httpWebRequest.ContentType = "application/json";
                httpWebRequest.Method = "POST";

                using (var streamWriter = new StreamWriter(httpWebRequest.GetRequestStream()))
                {
                    string json = "[{\"request\":\"enviar_email\"}]";

                    /*

                     string json = "{\"request\":\"test\"," +
                                  "\"password\":\"bla\"}";
                     */

                    streamWriter.Write(json);
                }

                var httpResponse = (HttpWebResponse)httpWebRequest.GetResponse();
                using (var streamReader = new StreamReader(httpResponse.GetResponseStream()))
                {
                    var result = streamReader.ReadToEnd();
                    dynamic json = JsonConvert.DeserializeObject(result);

                    //lblResposta.Text = json.RESULT;
                }

            }
            catch { request.Stop(); request.Start();
                lblResposta.Text = "ERRO REINICIANDO";
                lblResposta.ForeColor = Color.Blue;

            }
           

        }

        private void btnStart_Click(object sender, EventArgs e)
        {
            lblResposta.Text = "LIGADO";
            lblResposta.ForeColor = Color.Green;
            request.Stop();
            request.Start();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            lblResposta.Text = "DESLIGADO";
            lblResposta.ForeColor = Color.Red;
            request.Stop();
        }
    }
}
