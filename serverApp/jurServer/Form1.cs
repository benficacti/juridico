
using Newtonsoft.Json;
using System;
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
            request.Start();
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

                    lblResposta.Text = json.RESULT;
                }

            }
            catch { request.Stop(); request.Start();
                lblResposta.Text = "ERRO REINICIANDO";
            
            }
           

        }
    }
}
